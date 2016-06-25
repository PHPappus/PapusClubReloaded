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
use papusclub\Models\Persona;
use Carbon\Carbon;

class InscriptionActividadController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscriptionActividad()
    {
        $sedes = Sede::all();
        /*Filtrar las actividades que estan disponibles (>= que la fecha actual) y con estado 1 */
        $actividades=Actividad::where('estado','=',1)->where('a_realizarse_en','>=',Carbon::now())->get();
        /*Se envia las actividades a las cuales se encuentra inscrita la persona*/
        $actividades_persona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->actividades;
        return view('socio.actividades.inscripcion', compact('sedes','actividades','actividades_persona'));
    }

    //Se muestra la actividad a reservar y espera la confirmacion 
    public function storeInscriptionActividad($id)
    {
        $actividad=Actividad::find($id);// de aqui sacare el id de la sede :S
        return view('socio.actividades.confirmacion-inscripcion',compact('actividad'));
    }

    public function filterActividades(Request $request){
        $input= $request->all();
        $sedes= Sede::all();     
        /*Se envia las actividades a las cuales se encuentra inscrita la persona*/
        $actividades_persona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->actividades;


        $fecha_inicio   = new Carbon('America/Lima');
        $fecha_fin   = new Carbon('America/Lima'); 
        
        $fecha_inicio=$fecha_inicio->toDateString();
        $fecha_fin = Carbon::now()->addYears(1)->toDateString();

        
        if(!empty($input['fecha_inicio'])){
            $date=str_replace('/', '-', $input['fecha_inicio']);
            $fecha_inicio=date("Y-m-d",strtotime($date));
        }
        
        if(!empty($input['fecha_fin'])){
            $date=str_replace('/', '-', $input['fecha_fin']);
            $fecha_fin=date("Y-m-d",strtotime($date));
        }
        /*Se terminó de preparar las fechas*/

        /*Se prepara las horas para ser comparadas*/
        $horaInicio=$input['horaInicio'];
        $horaFin=$input['horaFin'];

        if(empty($input['horaInicio'])){
            $horaInicio="00:00";
        }
        if(empty($input['horaFin'])){
            $horaFin="23:59" ;
        }
        /*Se terminó de preparar las horas*/


        $actividades=Actividad::where('estado','=',1)
                               ->where('a_realizarse_en','>=',Carbon::now()->format('d-m-Y'))
                               ->where('a_realizarse_en','>=',$fecha_inicio)
                               ->where('a_realizarse_en','<=',$fecha_fin)
                               ->whereBetween('hora_inicio',[$horaInicio,$horaFin])
                               ->get();

        /*$actividadesxsede=Actividad::all();*/
   
        if($input['sedeSelec']!=-1){ //No son todas las sedes
            foreach ($actividades as $i => $actividad) {             
                    if($actividad->ambiente->sede->id!=$input['sedeSelec'])  unset($actividades[$i]);
            }
        }        

        return view('socio.actividades.inscripcion', compact('sedes','actividades','actividades_persona'));

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
                $actividades=Actividad::all();
                Session::flash('message-error','Ya se encuentra inscrito en esta actividad');
                return view('socio.actividades.inscripciones',compact('sedes'),compact('actividades'));
            }
            else{
                DB::beginTransaction();
                try{
                    if($actividad->cupos_disponibles<=0){
                    Session::flash('message-error','Lo sentimos, ya no hay cupos disponibles');
                    return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades");
                    }
                    else{
                        $persona=$usuario->persona;
                        $actividad->cupos_disponibles=$actividad->cupos_disponibles-1;
                        $actividad->save();
                        $persona->actividades()->attach($id,['precio'=> 11]);

                        Session::flash('message','La Inscripción fue realizada Correctamente');
                        
                    }
                }
                catch(ValidationException $e){
                    DB::rollback();
                    var_dump($e->getErrors());
                }
                DB::commit();
                
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
        $persona  = $usuario->persona;
        $actividad   = Actividad::find($id);


        $actividad->cupos_disponibles=$actividad->cupos_disponibles+1;
        $actividad->save();
        $persona->actividades()->detach([$id]);

        return back();
    }
}
