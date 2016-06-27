<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests\MakeInscriptionToPersonaRequest;

use Auth;
use Session;
use Hash;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\Postulante;
use Carbon\Carbon;
use DB;

class InscriptionActividadController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscriptionActividad()
    {
        $sedes = Sede::all();

        $fecha_inicio   = Carbon::now('America/Lima')->format('Y-m-d');   
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('Y-m-d');   

        /*Filtrar las actividades que estan disponibles (>= que la fecha actual) y con estado 1 */
        $actividades=Actividad::where('estado','=',1)->where('a_realizarse_en','>=',Carbon::now('America/Lima')->format('Y-m-d'))
                                ->where('a_realizarse_en','>=',$fecha_inicio)
                               ->where('a_realizarse_en','<=',$fecha_fin)
                               ->get();
        /*Se envia las actividades a las cuales se encuentra inscrita la persona*/
        $actividades_persona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->actividades;
        $usuario = Auth::user();
        $persona=$usuario->persona;
        $tipo_persona = $persona->tipopersona->id;

        /*Se le pasa los familiares que tiene la persona*/
        $postulante=Postulante::find($persona->id); 
        $familiares=$postulante->familiarxpostulante;   
      
        $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');
        $fecha_inicio=str_replace('-', '/', $fecha_inicio);
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('d-m-Y');
        $fecha_fin=str_replace('-', '/', $fecha_fin);

        return view('socio.actividades.inscripcion', compact('sedes','actividades','actividades_persona','tipo_persona','familiares','fecha_inicio','fecha_fin'));
    }

    //Se muestra la actividad a reservar y espera la confirmacion 
    public function storeInscriptionActividad($id)
    {
        $actividad=Actividad::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        
        return view('socio.actividades.confirmacion-inscripcion',compact('actividad', 'tipo_comprobantes'));
    }
    public function storeInscriptionActividadtoFamiliar($id)
    {
        $actividad=Actividad::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        $usuario=Auth::user();
        $persona=$usuario->persona;
        $postulante=Postulante::find($persona->id); 
        $familiares=$postulante->familiarxpostulante;

        /*dd($persona->id);*/
       /* $personas = Persona::where('id_usuario','=',null)->where('id_tipo_persona','=',1)//Trabajador
                         ->orwhere('id_usuario','=',null)->where('id_tipo_persona','=',2)//Postulante
                        ->get();*/
        return view('socio.actividades.confirmacion-inscripcion-familiar',compact('actividad', 'tipo_comprobantes','familiares'));
    }

    public function filterActividades(Request $request)
    {
        $input= $request->all();
        $sedes= Sede::all();     
        /*Se envia las actividades a las cuales se encuentra inscrita la persona*/
        $actividades_persona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->actividades;


        $fecha_inicio   = new Carbon('America/Lima');
        $fecha_fin   = new Carbon('America/Lima'); 
        
        $fecha_inicio=$fecha_inicio->toDateString();
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->toDateString();

        
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

        if($fecha_fin<$fecha_inicio){
            Session::flash('message-error','Usted ha ingresado un rango invalido de fechas, por favor ingrese uno valido (fecha de inicio debe ser menor a la fecha fin)');
            return Redirect("/inscripcion-actividad/inscripcion-actividades/filter");
        }
        else{
            $actividades=Actividad::where('estado','=',1)
                                   ->where('a_realizarse_en','>=',Carbon::now('America/Lima')->format('Y-m-d'))
                                   ->where('a_realizarse_en','>=',$fecha_inicio)
                                   ->where('a_realizarse_en','<=',$fecha_fin)
                                   ->whereBetween('hora_inicio',[$horaInicio,$horaFin])
                                   ->get();
        }

        /*$actividadesxsede=Actividad::all();*/
   
        if($input['sedeSelec']!=-1){ //No son todas las sedes
            foreach ($actividades as $i => $actividad) {             
                    if($actividad->ambiente->sede->id!=$input['sedeSelec'])  unset($actividades[$i]);
            }
        }        

        $usuario = Auth::user();
        $persona=$usuario->persona;
        $tipo_persona = $persona->tipopersona->id;

        /*Se le pasa los familiares que tiene la persona*/
        $postulante=Postulante::find($persona->id); 
        $familiares=$postulante->familiarxpostulante;        

        $fecha_inicio=$input['fecha_inicio'];
        $fecha_fin=$input['fecha_fin'];
        return view('socio.actividades.inscripcion', compact('sedes','actividades','actividades_persona','tipo_persona','familiares','fecha_inicio','fecha_fin'));
    }

    public function misinscripciones()
    {
        /* dd($actividades);*/
        /*Datos de inscripciones del usuario Socio*/
        $usuario  = Auth::user();
        $actividades = $usuario->persona->actividades;
        /*Datos de inscripciones de los familiares del usuario Socio*/
        $persona=$usuario->persona;
        $postulante=Postulante::find($persona->id); 
        $familiares=$postulante->familiarxpostulante;
        $actividadesxfamiliar;
        /*array_push(*/
        $fecha_validable=Carbon::now('America/Lima')->addDays(2)->format('Y-m-d');

        $tipo_persona = $persona->tipopersona->id;

        return view('socio.actividades.inscripciones', compact('actividades','familiares','fecha_validable','tipo_persona'));
    }

    public function makeInscriptionFamiliarToPersona(MakeInscriptionToPersonaRequest $request, $id)
    {
        $sedes = Sede::all();
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades-to-familiar");
        }
        else{
            if(Hash::check($request['password'],Auth::user()->password)){
                $persona     = Persona::find($request['persona_id']);
                $actividad   = Actividad::find($id);
                $flag=true;

                foreach ($persona->actividades as $actividad_persona) {
                    if($actividad_persona->id==$id){
                        $flag=false;
                    }
                }
                
                if(!$flag){
                    $actividades=Actividad::all();
                    Session::flash('message-error',"El familiar $persona->nombre ya se encuentra inscrito en esta actividad");
                    return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades-to-familiar");
                }
                else{
                    DB::beginTransaction();
                    try{
                        if($actividad->cupos_disponibles<=0){
                        Session::flash('message-error','Lo sentimos, ya no hay cupos disponibles');
                        return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades-to-familiar");
                        }
                        else{
                            $actividad->cupos_disponibles=$actividad->cupos_disponibles-1;
                            $actividad->save();
                            

                            $tipo_persona = $persona->tipopersona;
                            $tarifas = $actividad->tarifas;
                            $precioTarifa;
                            foreach ($tarifas as $tarifa) {
                                if($tarifa->tipo_persona == $tipo_persona){
                                    $persona->actividades()->attach($id,['precio'=> $tarifa->precio,'created_at'=>Carbon::now('America/Lima')]);
                                    $precioTarifa = $tarifa->precio;
                                    break;
                                }
                            }

                            $facturacion = new Facturacion();
                            $facturacion->persona_id = $persona->id;
                            $facturacion->actividad_id = $actividad->id;
                            $facturacion->tipo_comprobante = $request['tipo_comprobante'];
                            $nombreActividad = $actividad->nombre;
                            $facturacion->descripcion = "Inscripción de $nombreActividad";
                            $facturacion->total = $precioTarifa;
                            $facturacion->tipo_pago = "No se ha cancelado";
                            $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
                            $facturacion->estado = $estado->valor;

                            $facturacion->save();

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
                return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades-to-familiar");
            }
        }
    }   


    public function makeInscriptionToPersona(MakeInscriptionToPersonaRequest $request, $id)
    {
        $sedes = Sede::all();
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades");
        }
        else{
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
                    return Redirect("/inscripcion-actividad/".$id."/confirmacion-inscripcion-actividades");
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
                            

                            $tipo_persona = $persona->tipopersona;
                            $tarifas = $actividad->tarifas;
                            $precioTarifa=0;
                            foreach ($tarifas as $tarifa) {
                                if($tarifa->tipo_persona == $tipo_persona){
                                    $persona->actividades()->attach($id,['precio'=> $tarifa->precio,'created_at'=>Carbon::now('America/Lima')]);
                                    $precioTarifa = $tarifa->precio;
                                    break;
                                }
                            }

                            $facturacion = new Facturacion();
                            $facturacion->persona_id = $persona->id;
                            $facturacion->actividad_id = $actividad->id;
                            $facturacion->tipo_comprobante = $request['tipo_comprobante'];
                            $nombreActividad = $actividad->nombre;
                            $facturacion->descripcion = "Inscripción de $nombreActividad";
                            $facturacion->total = $precioTarifa;
                            $facturacion->tipo_pago = "No se ha cancelado";
                            $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
                            $facturacion->estado = $estado->valor;

                            $facturacion->save();

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
    }   
    public function removeInscriptionToPersona($id)
    {
        DB::beginTransaction();
        try{
            $usuario  = Auth::user();
            $persona  = $usuario->persona;
            $actividad   = Actividad::find($id);

            $facturacion = Facturacion::where('actividad_id', '=', $actividad->id)->where('persona_id', '=', $persona->id)->get()->first();
            
            if($facturacion)
                $facturacion->delete();

            $actividad->cupos_disponibles=$actividad->cupos_disponibles+1;
            $actividad->save();
            $persona->actividades()->detach([$id]);
        }
        catch(ValidationException $e){
            DB::rollback();
            var_dump($e->getErrors());
        }
        DB::commit();
        return back();
    }
    public function removeInscriptionToFamiliar($id,$idPersona)
    {
        DB::beginTransaction();
        try{
            $persona  = Persona::find($idPersona);
            $actividad   = Actividad::find($id);

            $facturacion = Facturacion::where('actividad_id', '=', $actividad->id)->where('persona_id', '=', $persona->id)->get()->first();
            
            if($facturacion)
                $facturacion->delete();

            $actividad->cupos_disponibles=$actividad->cupos_disponibles+1;
            $actividad->save();
            $persona->actividades()->detach([$id]);
        }
        catch(ValidationException $e){
            DB::rollback();
            var_dump($e->getErrors());
        }
        DB::commit();
        return back();
    }
}
