<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Http\Requests;
use papusclub\Http\Requests\StoreCalificacionRequest;
use papusclub\Models\Servicio;
use papusclub\Models\Sede;
use papusclub\Models\Socio;
use papusclub\Models\TarifarioServicio;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Models\Sedexservicio;
use papusclub\Models\ServicioxSedexPersona;
use papusclub\Models\Reserva;
use Session;
use Redirect;
use papusclub\User;
use papusclub\Models\Persona;
use Auth;
use Hash;
use Carbon\Carbon;
use papusclub\Models\Facturacion;
use papusclub\Http\Requests\StoreServicioSolicitudRequest;
use papusclub\Http\Requests\StoreServicioBuganlowSolicitudRequest;
class ServicioalsocioController extends Controller
{
   
   public function delete($id){
      $sxsxp = ServicioxSedexPersona::findOrFail($id);        
      if ($sxsxp){
        // en caso se encuentre se debe eliminar el monto 
        if ($sxsxp->codreserva!=-1 && $sxsxp->codreserva!=0){
                $reservas = Reserva::find($sxsxp->codreserva);
                $fact_id = $reservas->facturacion->id;
                $fact = Facturacion::find($fact_id);
                $fact->total = $fact->total - $sxsxp->precio;
                $fact->save();
        }
        $sxsxp->forceDelete();
      
      // Identificacion persona_id 
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        // Se extrae el filtrado inicial de la pestaña del index
        $sedes = Sede::all();   
        $servicios = Servicio::all();        
        $tarifarioservicios = TarifarioServicio::where('idtipopersona','=','1')->get();  // socio
        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $sedexservicioall = Sedexservicio::all();    
        $mensaje = Null ; 
        
        // Pero solo se extrae la informacion concerniente  a la persona 
        $sedexservicioxpersona = ServicioxSedexPersona::where('id_persona','=',$persona_id)->get();

        // se busca las sedes por servicios de las solicitudes del socio
      
        
        $expfila = count($sedexservicioxpersona);
        $expcolu = 8 ; 
        $tabla = null;
        $fil=0;
        $col=0;
        /*for(; $fil<$expfila; $fil++) {
            
        }*/
        foreach($sedexservicioxpersona as $sxsxp){
            
            $serv = Servicio::find($sxsxp->id_servicio);
            $sede = Sede::find($sxsxp->id_sede);
            $tipo=Configuracion::where('grupo','=','4')->where('id','=',$serv->tipo_servicio)->first();
            $nro_detalle = $sxsxp->codreserva ; 

            if ($nro_detalle != -1){
                $detalle = "Solicitud por Bungalow";
            }else
                $detalle = "Solicitud Generica";
            $precio = $sxsxp->precio ; 
            $estsolic = $sxsxp->estado;

            $tabla[$fil][0]=$serv->nombre;
            $tabla[$fil][1]=$serv->descripcion;

            $tabla[$fil][2]=$tipo->valor;
            $tabla[$fil][3]=$precio;
            $tabla[$fil][4]=$sede->nombre;
            $tabla[$fil][5]=$detalle;
            $tabla[$fil][6]=$estsolic;
            $tabla[$fil][7]= $sxsxp->id;


            $fil++;          
        }


        //return view('socio.servicios.prueba2',compact('sedexservicioxpersona'));
      $mensaje = "Se eliminó la solicitud !";
      return view('socio.servicios.prueba2',compact('tabla','sedexservicioxpersona','expfila','expcolu','sedexservicio','mensaje','expfull','mensaje'));
      } else return back();
        //return back();
     
   }
   public function misinscripciones(){
        // Identificacion persona_id 
        $mensaje = null;
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        // Se extrae el filtrado inicial de la pestaña del index
        $sedes = Sede::all();   
        $servicios = Servicio::all();        
        $tarifarioservicios = TarifarioServicio::where('idtipopersona','=','1')->get();  // socio
        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $sedexservicioall = Sedexservicio::all();    
        $mensaje = Null ; 
        
        // Pero solo se extrae la informacion concerniente  a la persona 
        $sedexservicioxpersona = ServicioxSedexPersona::where('id_persona','=',$persona_id)->get();
        //$sedexservicioxpersona = ServicioxSedexPersona::where('id_persona','=',$persona_id)->where('codreserva','<>',-1)->get();

        // se busca las sedes por servicios de las solicitudes del socio
      
        
        $expfila = count($sedexservicioxpersona);
        $expcolu = 8 ; 
        $tabla = null;
        $fil=0;
        $col=0;
        /*for(; $fil<$expfila; $fil++) {
            
        }*/
        foreach($sedexservicioxpersona as $sxsxp){
            
            $serv = Servicio::find($sxsxp->id_servicio);
            $sede = Sede::find($sxsxp->id_sede);
            $tipo=Configuracion::where('grupo','=','4')->where('id','=',$serv->tipo_servicio)->first();
            $nro_detalle = $sxsxp->codreserva ; 

            if ($nro_detalle != -1){
                $detalle = "Solicitud por Bungalow";
                $tabla[$fil][8]= true; 
            }else{
                $detalle = "Generica";
                $tabla[$fil][8]= false; 
            }
            $precio = $sxsxp->precio ; 
            $estsolic = $sxsxp->estado; 

            $tabla[$fil][0]=$serv->nombre;
            $tabla[$fil][1]=$serv->descripcion;

            $tabla[$fil][2]=$tipo->valor;
            $tabla[$fil][3]=$precio;
            $tabla[$fil][4]=$sede->nombre;
            $tabla[$fil][5]=$detalle;
            $tabla[$fil][6]=$estsolic;
            $tabla[$fil][7]= $sxsxp->id;



            $fil++;          
        }

        return view('socio.servicios.serviciosinscritos',compact('tabla','sedexservicioxpersona','expfila','expcolu','sedexservicio','mensaje','expfull','mensaje'));
   }
  
    public function index(){	

            $sedes = Sede::all();
            $tarifarioservicios = TarifarioServicio::all();	
            $tiposServicio=Configuracion::where('grupo','=','4')->get();
            
            $tipBung = Configuracion::where('grupo','=','4')->where('valor','=','A Bungalow')->first();
            $servicios = Servicio::where('tipo_servicio','<>',$tipBung->id)->get();
            $servicios = Servicio::all();
            $sedexservicio = Sedexservicio::all();
            $sedexservicioxpersona = ServicioxSedexPersona::all();
            $mensaje = Null ; 
            //return view('socio.servicios.prueba2',compact('tipBung'));
            return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','sedexservicioxpersona', 'mensaje'));
    }

    public function filtroServicio(Request $request){
    // datos de entrada 
    $input= $request->all(); // 941802191
	    
    // Fitrado pes LOL 
	$sedexserviciotodo = Sedexservicio::all();	
    if ($input['sedeSelec']==-1) {
    	$sedexservicio = Sedexservicio::all();	
    }else{
    	$sedexservicio=array();
        foreach ($sedexserviciotodo as $sst) {                        
            if ($sst->idsede == $input['sedeSelec'] ){
                array_push($sedexservicio,$sst);
            }            
        }    	
    }
            
    $sedes = Sede::all();	
   	$servicios = Servicio::all();
    $tarifarioservicios = TarifarioServicio::all();	
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $mensaje = NUll;
    $sedexservicioxpersona = ServicioxSedexPersona::all();
        return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','mensaje','sedexservicioxpersona'));
    }

    public function confirmareleccionsave(StoreServicioSolicitudRequest $request, $id){

    $sedes = Sede::all();   
    $servicios = Servicio::all();
    $estadosregistros = array();
    $tarifarioservicios = TarifarioServicio::all(); 
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $sedexservicio = Sedexservicio::all();
    $sedexservicioxpersona = ServicioxSedexPersona::all();

    $input= $request->all(); 

    $mensaje = "Se registró esta solicitud de servicio !" ; 
    if (array_key_exists('reserva', $input))
         $codreservatosave = $input['reserva'] ;
    else
         $codreservatosave = -1 ; 



    // identificacion uaurio
    $user_id = Auth::user()->id;
    $usuario = User::findOrFail($user_id);
    $persona_id = $usuario->persona->id;

    // Crea sevicio x sede x persona 
    $newsxsxp = new ServicioxSedexPersona();    
    $sedxser = Sedexservicio::where('id','=',$id)->first();     
    $tarifserv = TarifarioServicio::where('idservicio','=',$sedxser->idservicio)->first();

    $newsxsxp->id_servicio  = $sedxser->idservicio;
    $newsxsxp->id_sede  = $sedxser->idsede;
    $newsxsxp->calificacion = -1 ; 
    $newsxsxp->codreserva= $codreservatosave ;
    $newsxsxp->estado= "Solicitado";
    $newsxsxp->id_persona = $persona_id;
    $newsxsxp->precio = $tarifserv->precio;
    $newsxsxp->save();

    if ($codreservatosave!=-1 & $codreservatosave!=0){
        $reservas = Reserva::find($codreservatosave);
        $fact_id = $reservas->facturacion->id;
        $fact = Facturacion::find($fact_id);
        $fact->total = $fact->total + $tarifserv->precio;
        $fact->save();
    }

    if ($codreservatosave==-1){
        $newfact = new Facturacion();
        $newfact->persona_id=$persona_id;
        $newfact->total=$tarifserv->precio;
        $newfact->tipo_pago = "Efectivo";
        $newfact->tipo_comprobante = "Boleta";
        $newfact->servicio_id = $sedxser->idservicio;
        $newfact->estado = "Emitido";
        $newfact->save();
     }


    //$factura = new Facturacion();
    //$factura->persona_id = $persona_id;
    // $factura->tipo_pago = $input['tipo_pago'];
    // $factura->tipo_comprobante = $input['tipo_comprobante'];
    // $factura->estado = $input['estado'];        
        
    //$factura->save();       

    /*return view('socio.servicios.prueba',compact('sedexservicio','tarifserv'));
    */
        $sedexservicioxpersona = ServicioxSedexPersona::all();
    return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','sedexservicioxpersona','mensaje'));
    }
    public function confirmareleccionsave_b(StoreServicioBuganlowSolicitudRequest $request, $id){

    $sedes = Sede::all();   
    $servicios = Servicio::all();
    $estadosregistros = array();
    $tarifarioservicios = TarifarioServicio::all(); 
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $sedexservicio = Sedexservicio::all();
    $sedexservicioxpersona = ServicioxSedexPersona::all();

    $input= $request->all(); 

    $mensaje = "Se registró esta solicitud de servicio !" ; 
    if (array_key_exists('reserva', $input))
         $codreservatosave = $input['reserva'] ;
    else
         $codreservatosave = -1 ; 



    // identificacion uaurio
    $user_id = Auth::user()->id;
    $usuario = User::findOrFail($user_id);
    $persona_id = $usuario->persona->id;

    // Crea sevicio x sede x persona 
    $newsxsxp = new ServicioxSedexPersona();    
    $sedxser = Sedexservicio::where('id','=',$id)->first();     
    $tarifserv = TarifarioServicio::where('idservicio','=',$sedxser->idservicio)->first();

    $newsxsxp->id_servicio  = $sedxser->idservicio;
    $newsxsxp->id_sede  = $sedxser->idsede;
    $newsxsxp->calificacion = -1 ; 
    $newsxsxp->codreserva= $codreservatosave ;
    $newsxsxp->estado= "Solicitado";
    $newsxsxp->id_persona = $persona_id;
    $newsxsxp->precio = $tarifserv->precio;
    $newsxsxp->save();

    if ($codreservatosave!=-1 & $codreservatosave!=0){
        $reservas = Reserva::find($codreservatosave);
        $fact_id = $reservas->facturacion->id;
        $fact = Facturacion::find($fact_id);
        $fact->total = $fact->total + $tarifserv->precio;
        $fact->save();
    }

    if ($codreservatosave==-1){
        $newfact = new Facturacion();
        $newfact->persona_id=$persona_id;
        $newfact->total=$tarifserv->precio;
        $newfact->tipo_pago = "Efectivo";
        $newfact->tipo_comprobante = "Boleta";
        $newfact->servicio_id = $sedxser->idservicio;
        $newfact->estado = "Emitido";
        $newfact->save();
     }


    //$factura = new Facturacion();
    //$factura->persona_id = $persona_id;
    // $factura->tipo_pago = $input['tipo_pago'];
    // $factura->tipo_comprobante = $input['tipo_comprobante'];
    // $factura->estado = $input['estado'];        
        
    //$factura->save();       

    /*return view('socio.servicios.prueba',compact('sedexservicio','tarifserv'));
    */
        $sedexservicioxpersona = ServicioxSedexPersona::all();
    return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','sedexservicioxpersona','mensaje'));
    }
    public function confirmareleccion(Request $request, $id){

        
        // Indentificacion de usuario 
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
        $persona_id = $usuario->persona->id;
        $personas = Persona::find($persona_id);
        $codigo = 1 ;
        

        // Busco la sede x servicio en base al ID
        $sedexservicio = Sedexservicio::find($id); 
        $servicindentificado = Servicio::where('id','=',$sedexservicio->idservicio)->get();        
        
        $sedeindentificado = Sede::where('id','=',$sedexservicio->idsede)->first();        

            $servxsedexpersonatodos = ServicioxSedexPersona::all();
        $foo = false ; 
        $mensaje  = null;

        

            $sedes = Sede::all();   
            $servicios = Servicio::all();
            $estadosregistros = array();
            $tarifarioservicios = TarifarioServicio::all(); 
            $tiposServicio=Configuracion::where('grupo','=','4')->get();
            $sedexservicio = Sedexservicio::all();
            $ser = null ; 
            foreach ($servicindentificado as $sidenti){
                $ser = $sidenti;
            }
            $tip_s = null ; 
            foreach($tiposServicio as $tp){
                if ($ser->tipo_servicio == $tp->id ){
                        $tip_s = $tp->valor;
                        break;
                }
            }
            $precio = null ; 
            foreach ($tarifarioservicios as $ts){
                if ($ts->idservicio == $ser->id && $ts->idtipopersona == 1 ){
                        $precio = $ts->precio ; 
                }

            }
            if ($tip_s==="A Bungalow"){
                $user_id = Auth::user()->id;
                $usuario = User::find($user_id);
                $persona = $usuario->persona;  
                $reservas=Reserva::where('id_persona','=',$persona->id)->get();
                $valtipAmbiente=Configuracion::where('grupo','=','2')->where('valor','=','Bungalow')->first();

                return view('socio.servicios.indexdetalle-bungalow',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','id','servicindentificado','tip_s','precio','reservas','sedeindentificado','valtipAmbiente')); 
            }else{
                $estados = Configuracion::where('grupo','=','7')->get();
                $tipo_pagos = Configuracion::where('grupo','=','8')->get();
                $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
                return view('socio.servicios.indexdetalle',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','id','servicindentificado','tip_s','precio','estados','tipo_pagos','tipo_comprobantes'));
            }
    }

    public function calificar($id)
    {
        $puntajes = Configuracion::where('grupo','=',17)->get();
        return view('socio.servicios.calificarServicio',compact('puntajes','id'));
    }

    public function storeCalificacion(StoreCalificacionRequest $request)
    {
        $input = $request->all();
        $servicio = ServicioxSedexPersona::find($input['id']);

        $servicio->calificacion = intval($input['puntaje']);
        if ($input['descripcion'] != NULL) $servicio->descripcion = $input['descripcion'];

        $servicio->save();

        return redirect('servicios/mis-inscripciones')->with('stored', 'Se registró el puntaje correctamente.');
    }

}
