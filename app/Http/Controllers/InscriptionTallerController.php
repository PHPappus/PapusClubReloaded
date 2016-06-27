<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;

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

class InscriptionTallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d'))->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))->get();
        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;
        $sedes          = Sede::all();
        $usuario = Auth::user();
        $persona=$usuario->persona;
        $tipo_persona = $persona->tipopersona->id;
        return view('socio.talleres.index',compact('sedes','talleres','talleresxpersona', 'tipo_persona'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(StoreTallerRequest $request)
    {
        $input = $request->all();

        $taller = new Taller();
        $taller->nombre         = $input['nombre'];
        $taller->descripcion    = $input['descripcion'];
        $taller->profesor       = $input['profesor'];
        $taller->fecha_inicio   = $input['fecha_inicio'];
        $taller->fecha_fin      = $input['fecha_fin'];
        $taller->fecha_inicio_inscripciones   = $input['fecha_inicio_inscripciones'];
        $taller->fecha_fin_inscripciones      = $input['fecha_fin_inscripciones'];
        $taller->cantidad_sesiones  = $input['cantidad_sesiones'];
        $taller->vacantes       = $input['vacantes'];
        $taller->precio_base    = $input['precio_base'];
        $taller->estado         = $input['estado'];

        $taller->save();
        return back();
    
    }*/
    public function makeInscriptionFamiliarToUser(MakeInscriptionToUserRequest $request, $id)
    {
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/talleres-familiar/".$id."/confirm");
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
                    return Redirect('/talleres/mis-inscripciones');
                }
                else{
                    DB::beginTransaction();
                    try{
                        if($taller->vacantes<=0){
                            //throw new Exception("No hay vacantes disponibles");
                            Session::flash('message-error','Lo sentimos, ya no hay vacantes disponibles');
                            return Redirect("/talleres-familiar/".$id."/confirm");
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

                    
                    return Redirect('/talleres/mis-inscripciones');
                }
            }
            else{
                Session::flash('message-error','Contraseña incorrecta');
                return Redirect("/talleres-familiar/".$id."/confirm");
            }        
        }
    }
    public function makeInscriptionToUser(MakeInscriptionToUserRequest $request, $id)
    {
        if($request['tipo_comprobante']==-1){
            Session::flash('message-error','Por favor, elija el tipo de comprobante');
            return Redirect("/talleres/".$id."/confirm");
        }
        else{
            if(Hash::check($request['password'],Auth::user()->password)){
                $taller   = Taller::find($id);
                $flag=true;

                $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;
                foreach ($talleresxpersona as $tallerxpersona) {
                    if($tallerxpersona->id==$id){
                        $flag=false;
                    }
                }
                if(!$flag){
                    Session::flash('message','Ya se encuentra inscrito en este taller');
                    return Redirect('/talleres/mis-inscripciones');
                }
                else{
                    DB::beginTransaction();
                    try{
                        if($taller->vacantes<=0){
                            //throw new Exception("No hay vacantes disponibles");
                            Session::flash('message-error','Lo sentimos, ya no hay vacantes disponibles');
                            return Redirect("/talleres/".$id."/confirm");
                        }
                        else{
                            $taller->vacantes=$taller->vacantes-1;
                            $taller->save();

                            $persona=Persona::where('id_usuario','=',Auth::user()->id)->first();
                            
                            $tipo_persona = $persona->tipopersona;
                            $tarifas = $taller->tarifas;

                            $precioTarifa;
                            foreach ($tarifas as $tarifa) {
                                if($tarifa->tipo_persona == $tipo_persona){
                                    $persona->talleres()->attach($id,['precio'=> $tarifa->precio]);
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

                    
                    return Redirect('/talleres/mis-inscripciones');
                }
            }
            else{
                Session::flash('message-error','Contraseña incorrecta');
                return Redirect("/talleres/".$id."/confirm");
            }        
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taller = Taller::find($id);
        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;        
        return view('socio.talleres.consulta', compact('taller','talleresxpersona'));
    }

    public function confirmInscriptionFamiliar($id)
    {
        $usuario = Auth::user();
        $persona=$usuario->persona;

        $taller   = Taller::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        $postulante=Postulante::find($persona->id); 
        $familiares=$postulante->familiarxpostulante;

        $tipo_persona = $persona->tipopersona->id;

        return view('socio.talleres.confirmacion-inscripcion-familiar', compact('taller', 'tipo_comprobantes','tipo_persona','familiares'));

    }
    public function confirmInscription($id)
    {  
        $usuario  = Auth::user();
        $taller   = Taller::find($id);
        $flag=true;
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;
        foreach ($talleresxpersona as $tallerxpersona) {
            if($tallerxpersona->id==$id){
                $flag=false;
            }
        }
        if(!$flag){
            Session::flash('message','Ya se encuentra inscrito en este taller');
            $sedes  = Sede::all();
            $talleres=Taller::where('fecha_inicio_inscripciones','>=',Carbon::now())->get();
            
            return view('socio.talleres.index',compact('sedes','talleres','talleresxpersona'));
        }
        else{
            $usuario = Auth::user();
            $persona=$usuario->persona;
            $tipo_persona = $persona->tipopersona->id;
            return view('socio.talleres.confirmacion-inscripcion', compact('taller', 'tipo_comprobantes','tipo_persona'));
        }   
    }

    public function misinscripciones()
    {
        
        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;
        return view('socio.talleres.inscripciones', compact('talleresxpersona'));
    }
   
    
    public function filterTalleres(Request $request){
        $input= $request->all();
        $sedes= Sede::all();     
        /*Se envia los talleres a las cuales se encuentra inscrita la persona*/
        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()->talleres;


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

        $usuario = Auth::user();
        $persona=$usuario->persona;
        $tipo_persona = $persona->tipopersona->id;
        return view('socio.talleres.index',compact('sedes','talleres','talleresxpersona','tipo_persona'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeInscriptionToUser($id)
    {
        $usuario  = Auth::user();
        $persona  = $usuario->persona;
        $taller   = Taller::find($id);

        $facturacion = Facturacion::where('taller_id', '=', $taller->id)->where('persona_id', '=', $persona->id)->get()->first();

        if($facturacion)
            $facturacion->delete();

        $taller->vacantes=$taller->vacantes+1;
        $taller->save();

        $persona=Persona::where('id_usuario','=',Auth::user()->id)->first();
        $persona->talleres()->detach([$id]);

        return back();
    }
}
