<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Requests\MakeInscriptionToPersonaRequest;

use Auth;
use Session;
use Hash;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Sede;
use Carbon\Carbon;

class InscriptionActividadController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscriptionActividad()
    {
        $sedes = Sede::all();
        $actividades=Actividad::all();
        $ambientes = Ambiente::all();
        

        return view('socio.actividades.inscripcion', compact('sedes'),compact('actividades'));
    }

    //Se muestra la actividad a reservar y espera la confirmacion 
    public function storeInscriptionActividad($id)
    {
        $actividad=Actividad::find($id);// de aqui sacare el id de la sede :S
        return view('socio.actividades.confirmacion-inscripcion',compact('actividad'));
    }

    public function filterActividades(Request $request){
        $sedes= Sede::all();
        $input= $request->all();
        /*Se prepara las fechas para ser comparadas*/
        $fecha_inicio   = new Carbon(); 
        $fecha_fin      = new Carbon();
        
        if(empty($input['fecha_inicio'])){
            $fecha_inicio=Carbon::now();
        }
        else{
            $date = str_replace('/', '-', $input['fecha_inicio']);
            $fecha_inicio=$fecha_inicio->createFromFormat('d-m-Y', $date)->toDateTimeString(); 
        }

        if(empty($input['fecha_fin'])){
            $fecha_fin=Carbon::createFromDate(Carbon::now()->year, 12, 31); 
        }
        else{
            $date2 = str_replace('/', '-', $input['fecha_fin']);      
            $fecha_fin=$fecha_fin->createFromFormat('d-m-Y', $date2)->toDateTimeString(); 
        }

        /*if($input['sedeSelec']!=-1){
            $sede = Sede::find($input['sedeSelec']);//Esta es la sede que se filtro
            $ambientes=$sede->ambientes();
            /*$actividades=Actividad::where('id_ambiente','=','')*/
           /* dd($sede->actividades);*/
           /*$actividades=array();
           dd($ambientes);
           foreach ($ambientes as $ambiente) {
                if($ambiente->sede()->id==$input['sedeSelec'])
                 $actividades=$actividades + $ambiente->sede();
           }*/
           /*dd($actividades);*/
            /*$actividades=$actividades->where('estado','=',true)
                    ->where('a_realizarse_en','>=',Carbon::now())
                    ->where('a_realizarse_en','>=',$fecha_inicio)
                    ->where('a_realizarse_en','<=',$fecha_fin)
                    ->get();*/
        /*}
        else{*/
            $actividades=Actividad::where('estado','=',true)
                    ->where('a_realizarse_en','>=',Carbon::now())
                    ->where('a_realizarse_en','>=',$fecha_inicio)
                    ->where('a_realizarse_en','<=',$fecha_fin)
                    ->get();
        /*}*/

        /*dd($fecha_inicio);*/
        /*$var=Actividad::find(1);
        dd($var->a_realizarse_en);
        $date_at = strtotime(date("Y-m-d H:i:s"));*/
        

        return view('socio.actividades.inscripcion', compact('sedes'),compact('actividades'));

    }

    public function misinscripciones()
    {
        $usuario  = Auth::user();
        $actividades = $usuario->persona->actividades;
       /* dd($actividades);*/
        return view('socio.actividades.inscripciones', compact('actividades'));
    }


    public function makeInscriptionToPersona(MakeInscriptionToPersonaRequest $request, $id)
    {
            $sedes = Sede::all();
            /*$actividades=Actividad::all();*/
        /*if(Auth::attempt(['password'=>$request['password']])){*/
        if(Hash::check($request['password'],Auth::user()->password)){
            $usuario     = Auth::user();
            $actividad   = Actividad::find($id);
            $flag=true;

            foreach ($usuario->persona->actividades as $actividad_persona) {
                if($actividad_persona->id==$id){
                    $flag=false;
                }
            }
            
            if(!$flag){
                Session::flash('message','Ya se encuentra inscrito en este taller');
                return view('socio.actividades.inscripciones',compact('sedes'),compact('actividades'));
            }
            else{
                $persona=$usuario->persona;
                $actividad->cupos_disponibles=$actividad->cupos_disponibles-1;
                $actividad->save();
                $persona->actividades()->attach($id,['precio'=> 11]);

                Session::flash('message','La Inscripción fue realizada Correctamente');
                return Redirect("/inscripcion-actividad/mis-inscripciones");
            }
        }
        else{
            Session::flash('message-error','Contraseña incorrecta');
            return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades");
        }

    }   
    public function removeInscriptionToPersona($id)
    {
        $usuario  = Auth::user();
        $persona=$usuario->persona;
        $actividad   = Actividad::find($id);


        $actividad->cupos_disponibles=$actividad->cupos_disponibles+1;
        $actividad->save();
        $persona->actividades()->detach([$id]);

        return back();
    }
}
