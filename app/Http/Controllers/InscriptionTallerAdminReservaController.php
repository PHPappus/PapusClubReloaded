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
        try {   
            $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d'))->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))->get();
            
            $sedes          = Sede::all();
            $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');

            return view('admin-reserva.talleres.index',compact('sedes','talleres','fecha_inicio'));
        } catch (\Exception $e) {
            $error = 'index-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function confirmInscription($id)
    {
        try {
            $taller   = Taller::find($id);
            $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

            $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                                 ->get();

            return view('admin-reserva.talleres.confirmacion-inscripcion', compact('taller', 'tipo_comprobantes','personas'));
        } catch (\Exception $e) {
            $error = 'confirmInscription-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }

    }
    public function filterTalleresAdminReserva(Request $request)
    {
        try {    
            $input= $request->all();
            $sedes= Sede::all();     


            $fecha_inicio   = new Carbon('America/Lima');
            /*$fecha_fin   = new Carbon('America/Lima'); */
            
            $fecha_inicio=$fecha_inicio->toDateString();
            /*$fecha_fin = Carbon::now('America/Lima')->addYears(1)->toDateString();*/
            
            $talleres=array();
            
            if(!empty($input['fecha_inicio'])){
                $date=str_replace('/', '-', $input['fecha_inicio']);
                $fecha_inicio=date("Y-m-d",strtotime($date));
                $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d')) 
                                ->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))
                                ->where('fecha_inicio','>=',$fecha_inicio)
                                ->where('fecha_fin','>=',$fecha_inicio)->get();
                                   /*->where('fecha_fin_inscripciones','>=',$fecha_fin)
                                   ->orwhere('fecha_fin_inscripciones','<',$fecha_fin)*/
                                   /*->whereBetween('fecha_inicio_inscripciones',[$fecha_inicio,$fecha_fin])*/
                                   /*->get();*/
            }
            else{
                $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d')) ->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))->get();
            }
            /*if(!empty($input['fecha_fin'])){
                $date=str_replace('/', '-', $input['fecha_fin']);
                $fecha_fin=date("Y-m-d",strtotime($date));
            }*/
            /*Se terminó de preparar las fechas*/
           /* dd($fecha_fin);*/

            

       
            if($input['sedeSelec']!=-1){ //No son todas las sedes
                foreach ($talleres as $i => $taller) {             
                        if($taller->reserva->ambiente->sede->id!=$input['sedeSelec'])  unset($talleres[$i]);
                }
            }        
            $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                                 ->get();
            $fecha_inicio=$input['fecha_inicio'];
            return view('admin-reserva.talleres.index',compact('sedes','talleres','fecha_inicio'));
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
        } catch (\Exception $e) {
            $error = 'filterTalleresAdminReserva-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function inscripciones()
    {
        try {    
            $id_talleres = DB::table('personaxtaller')->lists('taller_id');

            $id_personas = DB::table('personaxtaller')->lists('persona_id');
            /*Datos de inscripciones de los familiares del usuario Socio*/
            $personas=Persona::wherein('id',$id_personas)->get();
            $talleres=Taller::wherein('id',$id_talleres)->get();    
            $fecha_validable=Carbon::now('America/Lima')->addDays(2)->format('Y-m-d');

            return view('admin-reserva.talleres.inscripciones', compact('talleres','personas','fecha_validable'));
        } catch (\Exception $e) {
            $error = 'inscripciones-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function show($id){
        try {
        	$taller = Taller::find($id); 
            return view('admin-reserva.talleres.consulta', compact('taller'));

        } catch (\Exception $e) {
            $error = 'index-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function removeInscriptionToPersona($id,$idPersona)
    {
            try {
                DB::beginTransaction();
                try{
                    $persona  = Persona::find($idPersona);
                    $taller   = Taller::find($id);

                    $facturacion = Facturacion::where('taller_id', '=', $taller->id)->where('persona_id', '=', $persona->id)->get()->first();

                    if($facturacion)
                        $facturacion->delete();

                    $taller->vacantes=$taller->vacantes+1;
                    $taller->save();

                    $persona->talleres()->detach([$id]);
                }
                catch(ValidationException $e){
                    DB::rollback();
                    var_dump($e->getErrors());
                }
                DB::commit();
                return back();
            } catch (\Exception $e) {
            $error = 'index-IncriptionTallerAdminReservaController';
            return view('errors.corrigeme', compact('error'));
        }
    }
}
