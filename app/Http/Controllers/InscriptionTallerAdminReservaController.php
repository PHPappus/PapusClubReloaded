<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

use papusclub\Http\Requests\MakeInscriptionToUserRequest;

use Session;
use Redirect;

use papusclub\Models\Taller;
use papusclub\Models\Sede;
use papusclub\User;
use papusclub\Models\Persona;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\Promocion;
use papusclub\Models\Postulante;
use Auth;
use Hash;
use Carbon\Carbon;
use Exception;
use DB;

class InscriptionTallerAdminReservaController extends Controller
{
    public function index()
    {
        $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d'))->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))->get();
        
        $sedes          = Sede::all();
        $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');

        return view('admin-reserva.talleres.index',compact('sedes','talleres','fecha_inicio'));
    }

    public function confirmInscription($id)
    {
        
        $taller   = Taller::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                             ->get();

        return view('admin-reserva.talleres.confirmacion-inscripcion', compact('taller', 'tipo_comprobantes','personas'));

    }

    public function makeInscriptionToPersona(MakeInscriptionToUserRequest $request, $id)
    {
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/taller-admin-reserva/inscripcion/".$id."/confirmacion");
        }
        else{
            if(Hash::check($request['password'],Auth::user()->password)){
                $persona     = Persona::find($request['persona_id']);

                $taller   = Taller::find($id);
                $flag=true;

                foreach ($persona->talleres as $tallerxpersona) {
                    if($tallerxpersona->id==$id){
                        $flag=false;
                    }
                }
                if(!$flag){
                    Session::flash('message-error',"El familiar $persona->nombre ya se encuentra inscrito en este taller");
                    return Redirect("/taller-admin-reserva/inscripcion/".$id."/confirmacion");
                }
                else{
                    DB::beginTransaction();
                    try{
                        if($taller->vacantes<=0){
                            //throw new Exception("No hay vacantes disponibles");
                            Session::flash('message-error','Lo sentimos, ya no hay vacantes disponibles');
                            return Redirect("/taller-admin-reserva/inscripcion/".$id."/confirmacion");
                        }
                        else{
                            $taller->vacantes=$taller->vacantes-1;
                            $taller->save();
                            
                            $tipo_persona = $persona->tipopersona;
                            $tarifas = $taller->tarifas;

                            $precioTarifa=0;
                            foreach ($tarifas as $tarifa) {
                                if($tarifa->tipo_persona == $tipo_persona){
                                    $persona->talleres()->attach($id,['precio'=> $tarifa->precio,'created_at'=>Carbon::now('America/Lima')]);
                                    $precioTarifa = $tarifa->precio;
                                    break;
                                }
                            }

                            $promos = Promocion::where('tipo','=','Taller')->where('estado','=',TRUE)->get();
                            if ($promos != NULL){
                                foreach ($promos as $promo) {
                                    $precioTarifa = $precioTarifa - ($precioTarifa*$promo->porcentajeDescuento)/100;
                                }
                            }

                            
                            $facturacion = new Facturacion();
                            $facturacion->persona_id = $persona->id;
                            $facturacion->taller_id = $taller->id;
                            $facturacion->tipo_comprobante = $request['tipo_comprobante'];
                            $nombreTaller = $taller->nombre;
                            $facturacion->descripcion = "Inscripción de $nombreTaller";
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
                    /*$usuario->talleres()->attach($id,['precio'=> $taller->precio_base]);*/

                    
                    return Redirect('/taller-admin-reserva/inscripciones');
                }
            }
            else{
                Session::flash('message-error','Contraseña incorrecta');
                return Redirect("/taller-admin-reserva/inscripcion/".$id."/confirmacion");
            }        
        }
    }
    public function inscripciones()
    {
        $id_talleres = DB::table('personaxtaller')->lists('taller_id');

        $id_personas = DB::table('personaxtaller')->lists('persona_id');
        /*Datos de inscripciones de los familiares del usuario Socio*/
        $personas=Persona::wherein('id',$id_personas)->get();
        $talleres=Taller::wherein('id',$id_talleres)->get();    
        $fecha_validable=Carbon::now('America/Lima')->addDays(2)->format('Y-m-d');

        return view('admin-reserva.talleres.inscripciones', compact('talleres','personas','fecha_validable'));
    }
}
