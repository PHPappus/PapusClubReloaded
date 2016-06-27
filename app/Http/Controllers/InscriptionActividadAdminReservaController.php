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

class InscriptionActividadAdminReservaController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscriptionActividadAdminReserva()
    {
        $sedes = Sede::all();

        $fecha_inicio   = Carbon::now('America/Lima')->format('Y-m-d');   
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('Y-m-d');   

        /*Filtrar las actividades que estan disponibles (>= que la fecha actual) y con estado 1 */
        $actividades=Actividad::where('estado','=',1)->where('a_realizarse_en','>=',Carbon::now('America/Lima')->format('Y-m-d'))
                                ->where('a_realizarse_en','>=',$fecha_inicio)
                               ->where('a_realizarse_en','<=',$fecha_fin)
                               ->get();
        
        $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');
        $fecha_inicio=str_replace('-', '/', $fecha_inicio);
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('d-m-Y');
        $fecha_fin=str_replace('-', '/', $fecha_fin);

        return view('admin-reserva.actividades.inscripcion', compact('sedes','actividades','fecha_inicio','fecha_fin'));
    }
    public function filterActividadesAdminReserva()
    {

    }
    public function storeInscriptionActividadAdminReserva($id)
    {
        $actividad=Actividad::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                             ->get();

        return view('admin-reserva.actividades.confirmacion-inscripcion',compact('actividad', 'tipo_comprobantes','personas'));
    }

    public function makeInscriptionToPersona(MakeInscriptionToPersonaRequest $request, $id)
    {
        $sedes = Sede::all();
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/actividad-admin-reserva/inscripcion/".$id."/confirmacion");
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
                    Session::flash('message-error',"El socio $persona->nombre ya se encuentra inscrito en esta actividad");
                    return Redirect("/actividad-admin-reserva/inscripcion/".$id."/confirmacion");
                }
                else{
                    DB::beginTransaction();
                    try{
                        if($actividad->cupos_disponibles<=0){
                            Session::flash('message-error','Lo sentimos, ya no hay cupos disponibles');
                            return Redirect("/actividad-admin-reserva/inscripcion/".$id."/confirmacion");
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
                    
                    return Redirect("/actividad-admin-reserva/inscripciones");
                }
            }
            else{
                Session::flash('message-error','Contraseña incorrecta');
                return Redirect("/actividad-admin-reserva/inscripcion/".$id."/confirmacion");
            }
        }
    } 
    public function inscripciones()
    {
        $id_actividades = DB::table('actividad_persona')->lists('actividad_id');

        
        /*Datos de inscripciones de los familiares del usuario Socio*/
        $actividades=DB::table('actividad')
                    ->whereIn('id', $id_actividades)->get();
        $fecha_validable=Carbon::now('America/Lima')->addDays(2)->format('Y-m-d');

        return view('admin-reserva.actividades.inscripciones', compact('actividades','fecha_validable'));
    }
}
