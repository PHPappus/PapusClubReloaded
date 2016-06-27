<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\User;
use papusclub\Models\Reserva;
use papusclub\Models\Servicio;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\Promocion;
use papusclub\Http\Requests\StoreReservaBungalowSocio;
use papusclub\Http\Requests\StoreReservaBungalowAdminR;
use papusclub\Http\Requests\StoreReservaOtroAmbienteSocio;
use papusclub\Http\Requests\StoreReservaOtroAmbienteAdminR;
use papusclub\Http\Requests\StoreAgregarServiciosRequest;
use papusclub\Models\Socio;
use Auth;
use Session;
use Carbon\Carbon;
use DB;
use papusclub\Models\Sedexservicio;
use papusclub\Models\ServicioxSedexPersona;
use papusclub\Models\TarifarioServicio;
use Illuminate\Support\Facades\Input;
class ReservarAmbienteController extends Controller
{   
    public function verServices($id){

     
     
     
     $reserva = Reserva::find($id);
     $idsede = $reserva->ambiente->sede_id;
     $personaid = $reserva->persona->id;
     
     $nombreBungalo = $reserva->ambiente->nombre;
     $nsocio  = $reserva->persona->nombre . " " . $reserva->persona->ap_paterno;


     $sedexservicioxpersona =  ServicioxSedexPersona::where('id_persona','=',$personaid)->where('codreserva', '>', 0)->get();

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


        
      $mensaje = null;

        
        return view('admin-reserva.reservar-ambiente.visualizar-services',compact('tabla','expfila','expcolu','serv_ids','mensaje','nombreBungalo','nsocio'));
   }
    public function  storeServices(StoreAgregarServiciosRequest $rquest, $id){
     $serv_ids = Input::get('Seleccionar');
     
     
     
     $reserva = Reserva::find($id);
     $idsede = $reserva->ambiente->sede_id;
     $personaid = $reserva->persona->id;

     foreach ($serv_ids as $s) {
            $tarifario = TarifarioServicio::where('idservicio','=',$s)->where('idtipopersona','=',1)->first(); // Socio
            $sxsxp = new ServicioxSedexPersona();
            $sxsxp->id_servicio = (int)$s;
            $sxsxp->id_sede = $idsede;
            $sxsxp->id_persona = $personaid ;
            $sxsxp->codreserva = $id ; 
            $sxsxp->estado = "Atendido";
            $sxsxp->precio = $tarifario->precio;
            $sxsxp->calificacion = -1;   
            $sxsxp->save();
    }   

     $sedexservicioxpersona =  ServicioxSedexPersona::where('id_persona','=',$personaid)->where('codreserva', '>', 0)->get();

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


    return view('admin-reserva.reservar-ambiente.store-services',compact('tabla','expfila','expcolu','serv_ids','mensaje'));
    }
    public function agregarServices($id){
        $reserva = Reserva::find($id);
        $iddesede = $reserva->ambiente->sede->id;
        $sede = Sede::find($iddesede);
        $tipBungalow=Configuracion::where('grupo','=','4')->where('valor','=','A Bungalow')->first();        
        $nombreBungalo = $reserva->ambiente->nombre;
        $nsocio  = $reserva->persona->nombre . " " . $reserva->persona->ap_paterno;

        $tiposServicio=Configuracion::where('grupo','=','4')->get();        
        $serviciosdesede = Sedexservicio::where('idsede','=',$sede->id)->get();
        $serviciostodos = Servicio::all();

        $servicios=array();

        foreach ($serviciostodos as $sv) {
            $foo = false;
            foreach ($serviciosdesede as $servdsede) {
                    if ($sv->id == $servdsede->idservicio &&  $sv->tipo_servicio == $tipBungalow->id){
                        $foo = True;
                        break;      
                    }
            }            
            if ($foo) {
                array_push($servicios,$sv);
            }            
        }


        
        return view('admin-reserva.reservar-ambiente.agregar-servicios',compact('tipBungalow','id','iddesede','servicios','tiposServicio','serviciosdesede','nombreBungalo','nsocio'));
    }
    //Muestra la pantalla para realizar la reserva de un bungalow
    public function reservarBungalow()
    {
        $sedes = Sede::all();
        //$ambientes = Ambiente::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado', '=', 'Activo')->get();  
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);

        $bloqueado = true;
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue', 'bloqueado'));
    }
    public function reservarBungalowFiltrados(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = (new Carbon('America/Lima'))->addDays(25);
        $fechaIniValue   = new Carbon('America/Lima');
        $fechaFinValue   = (new Carbon('America/Lima'))->addDays(25); 
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado', '=', 'Activo')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIniValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
            $fechaFinValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
         if(!empty($input['capacidad_actual'])){
            $capacidad=$input['capacidad_actual'];
         }else
            $capacidad=0;

        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva',[$fechaIni,$fechaFin])->get();
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva',[$fechaIni,$fechaFin])->get();
        
        foreach ($ambientes as $i=> $ambiente) {
                if($ambiente->capacidad_actual<$capacidad)  unset($ambientes[$i]);
        }
        if($input['sedeSelec']!=-1){
            $sedeFiltro=$input['sedeSelec'];
            
            foreach ($ambientes as $i=> $ambiente) {
                    if($ambiente->sede->id!=$sedeFiltro)  unset($ambientes[$i]);
            }
        }
        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id)  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
            }
        }
        $bloqueado = false;
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue', 'bloqueado'));
    }
    //Muestra la pantalla para realizar la reserva de un ambiente que no sea bungalow
    public function reservarOtrosAmbientes()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->where('estado', '=', 'Activo')->get();
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);
        $bloqueado = true;
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue', 'bloqueado'));
    }

    public function reservarOtrosAmbientesFiltrados(Request $request)
    {
        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = (new Carbon('America/Lima'))->addDays(25);
        $fechaIniValue   = new Carbon('America/Lima');
        $fechaFinValue   = (new Carbon('America/Lima'))->addDays(25); 
        $sedes = Sede::all();
        
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->where('estado', '=', 'Activo')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIniValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
            $fechaFinValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
         if(!empty($input['capacidad_actual'])){
            $capacidad=$input['capacidad_actual'];
         }else
            $capacidad=0;
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
            
        $reservas_caso_1=Reserva::where('fecha_inicio_reserva','=',$fechaIni )->whereBetween('hora_inicio_reserva',[$horaInicio,$horaFin])->get();

        $reservas_caso_2=Reserva::where('fecha_inicio_reserva','=', $fechaFin)->whereBetween('hora_fin_reserva',[$horaInicio,$horaFin])->get();
        foreach ($ambientes as $i=> $ambiente) {
                if($ambiente->capacidad_actual<$capacidad)  unset($ambientes[$i]);
        }
        if($input['sedeSelec']!=-1){
            $sedeFiltro=$input['sedeSelec'];
            
            foreach ($ambientes as $i=> $ambiente) {
                    if($ambiente->sede->id!=$sedeFiltro)  unset($ambientes[$i]);
            }
        }
        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id)  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
            }
        }
        $bloqueado = false;
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue', 'bloqueado'));
        
    }

    public function createBungalow($id,$fechaIniValue,$fechaFinValue)
    {   
        $ambiente = Ambiente::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;  
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona->id;
        $fechaIni=$fechaIniValue;
        $fechaFin=$fechaFinValue;
        return view('socio.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente','tipo_comprobantes', 'tipo_persona','fechaIni','fechaFin'));
    }

    //Se muestra el Bungalow a reservar y espera su confirmacion para la reserva
    public function storeBungalow($id, StoreReservaBungalowSocio $request)
    {
        
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;        
        $ambiente_id = $id;

        $input = $request->all();
        $carbon=new Carbon(); 

        $reserva = new Reserva();
        $reserva->ambiente_id = $ambiente_id;
        $reserva->id_persona = $persona_id;
        if (empty($input['fecha_inicio_reserva'])) {
            $reserva->fecha_inicio_reserva="";
        }else{
            $fecha_inicio = str_replace('/', '-', $input['fecha_inicio_reserva']);      
            $reserva->fecha_inicio_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
        }

        if (empty($input['fecha_fin_reserva'])) {
            $reserva->fecha_fin_reserva="";
        }else{
            $fecha_fin = str_replace('/', '-', $input['fecha_fin_reserva']);      
            $reserva->fecha_fin_reserva=$carbon->createFromFormat('d-m-Y', $fecha_fin)->toDateString();
        }

        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_inicio_reserva="";
        }else{
            $reserva->hora_inicio_reserva=Carbon::createFromTime(0, 0, 0);            
        }


        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_fin_reserva="";
        }else{
            $reserva->hora_fin_reserva=Carbon::createFromTime(0, 0, 0);
        }
        $fechaIniValue=$carbon->createFromFormat('d-m-Y', $fecha_inicio);
        $fechaFinValue=$carbon->createFromFormat('d-m-Y', $fecha_fin);
        $diff=$fechaFinValue->diffInDays($fechaIniValue);
        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio*$diff;        
        }

        $promos = Promocion::where('tipo','=','Bungalow')->where('estado','=',TRUE)->get();
        if ($promos != NULL)
        {
            foreach ($promos as $promo) {
                $reserva->precio = $reserva->precio - ($reserva->precio*$promo->porcentajeDescuento)/100;
            }
        }

        //$reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;
        
        $reserva->save();


        $facturacion = new Facturacion();
        $facturacion->persona_id = $persona_id;
        $facturacion->reserva_id = $reserva->id;
        $facturacion->tipo_comprobante = $input['tipo_comprobante'];
        $nombreReserva = $reserva->ambiente->nombre;
        $facturacion->descripcion = "Reserva de $nombreReserva";
        $facturacion->total = $reserva->precio;
        $facturacion->tipo_pago = "No se ha cancelado";
        $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
        $facturacion->estado = $estado->valor;

        $facturacion->save();


       

        return redirect('reservar-ambiente/reservar-bungalow')->with('stored', 'Se registró la reserva del bungalow correctamente.');        
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva

    public function createOtroTipoAmbiente($id,$fechaIniValue,$fechaFinValue)
    {   
        $ambiente = Ambiente::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;  
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona->id;
        $fechaIni=$fechaIniValue;
        $fechaFin=$fechaFinValue;
        return view('socio.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente','tipo_comprobantes', 'tipo_persona','fechaIni','fechaFin'));
    }

     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function storeOtroTipoAmbiente($id, StoreReservaOtroAmbienteSocio $request)
    {
        DB::beginTransaction();
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;        
        $ambiente_id = $id;

        $input = $request->all();
        $carbon=new Carbon(); 

        $reserva = new Reserva();
        $reserva->ambiente_id = $ambiente_id;
        $reserva->id_persona = $persona_id;

        if (empty($input['fecha_inicio_reserva'])) {
            $reserva->fecha_inicio_reserva="";
        }else{
            $fecha_inicio = str_replace('/', '-', $input['fecha_inicio_reserva']);      
            $reserva->fecha_inicio_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
            $reserva->fecha_fin_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
        }
        
        if (empty($input['hora_inicio_reserva'])) {
            $reserva->hora_inicio_reserva="";
        }else{
            $reserva->hora_inicio_reserva=$carbon->createFromFormat('H:i', $input['hora_inicio_reserva'])->toTimeString();
        }


        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_fin_reserva="";
        }else{
            $reserva->hora_fin_reserva=$carbon->createFromFormat('H:i', $input['hora_fin_reserva'])->toTimeString();
        }
        $horaIniValue=$carbon->createFromFormat('H:i', $input['hora_inicio_reserva']);
        $horaFinValue=$carbon->createFromFormat('H:i', $input['hora_fin_reserva']);
        $diff=$horaFinValue->diffInHours($horaIniValue);
        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio*$diff;        
        }

        $promos = Promocion::where('tipo','=','Ambiente')->where('estado','=',TRUE)->get();
        if ($promos != NULL)
        {
            foreach ($promos as $promo) {
                $reserva->precio = $reserva->precio - ($reserva->precio*$promo->porcentajeDescuento)/100;
            }
        }

        //$reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;

        $reserva->save();

        $facturacion = new Facturacion();
        $facturacion->persona_id = $persona_id;
        $facturacion->reserva_id = $reserva->id;
        $facturacion->tipo_comprobante = $input['tipo_comprobante'];
        $nombreReserva = $reserva->ambiente->nombre;
        $facturacion->descripcion = "Reserva de $nombreReserva";
        $facturacion->total = $reserva->precio;
        $facturacion->tipo_pago = "No se ha cancelado";
        $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
        $facturacion->estado = $estado->valor;

        $facturacion->save();


        DB::commit();
        return redirect('reservar-ambiente/reservar-otros-ambientes')->with('stored', 'Se registró la reserva del ambiente correctamente.');
    }

     public function searchSocio() // va  a la lista de los socios
    {
        
        return view('socio.persona.socio.buscarSocio');
    }

     public function listaReservas() // va  a la lista la reserva de los socios
    {
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona = $usuario->persona;  
        $reservas=Reserva::where('id_persona','=',$persona->id)->get();
        return view('socio.reservar-ambiente.lista-reservas',compact('reservas')); //debe pasarse la lsita de reservas del socio 
    }
     public function showReserva($id) // va  a la lista la reserva de los socios
    {
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona = $usuario->persona;  
        $reservas= Reserva::where('id_persona','=',$persona->id)->get();
        $reserva = Reserva::find($id);
        return view('socio.reservar-ambiente.detail-reserva',compact('reserva')); //debe pasarse la lsita de reservas del socio 
    }
    
    public function eliminarReserva($id){
        $reserva=Reserva::find($id);
        $today=Carbon::now();
        $carbon=new Carbon();
        $fechaInicio=$carbon->createFromFormat('Y-m-d', $reserva->fecha_inicio_reserva);
        $diff=$fechaInicio->diffInDays($today);
        if($diff >= 4){
            $reserva->delete();
            if($reserva->facturacion)
                $reserva->facturacion->delete();
        }
        else{
            return redirect('reservar-ambiente/lista-reservas')->with('delete', 'No se puede eliminar esta reserva,se vencio el plazo maximo para su anulacion.');
        }
        

        return back();
        
    }

    public function eliminarReservaBungalowAdminR($id){
        $reserva=Reserva::find($id);
        $today=Carbon::now();
        $carbon=new Carbon();
        $fechaInicio=$carbon->createFromFormat('Y-m-d', $reserva->fecha_inicio_reserva);
        $diff=$fechaInicio->diffInDays($today);
        if($diff >= 4){
            $reserva->delete();
            if($reserva->facturacion)
                $reserva->facturacion->delete();
        }
        else{
            return redirect('reservar-ambiente/consultar-bungalow-adminR')->with('delete', 'No se puede eliminar esta reserva, se vencio el plazo maximo para su anulacion.');
        }
        
        return back();
        
    }

    public function eliminarReservaOtrosAdminR($id){
        $reserva=Reserva::find($id);
        $today=Carbon::now();
        $carbon=new Carbon();
        $fechaInicio=$carbon->createFromFormat('Y-m-d', $reserva->fecha_inicio_reserva);
        $diff=$fechaInicio->diffInDays($today);
        if($diff >= 4){
            $reserva->delete();
            if($reserva->facturacion)
                $reserva->facturacion->delete();
        }
        else{
            return redirect('reservar-ambiente/consultar-otros-ambientes-adminR')->with('delete', 'No se puede eliminar esta reserva, se vencio el plazo maximo para su anulacion.');
        }
        
        return back();
        
    }

    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    ////////////////ADMIN  RESERVA =D
    //Muestra la pantalla para realizar la reserva de un bungalow
    public function reservarBungalowAdminR()
    {
        $sedes = Sede::all();
        //$ambientes = Ambiente::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado', '=', 'Activo')->get();  
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);
        $bloqueado = true;
        return view('admin-reserva.reservar-ambiente.reservar-bungalow')->with(compact('sedes','ambientes','fechaIniValue','fechaFinValue','bloqueado'));
    }
    public function seleccionarSocioBungalowAdminR($id,$fechaIniValue,$fechaFinValue)
    {
        $ambiente = Ambiente::find($id);
        $socios = Socio::all();
        $fechaIni=$fechaIniValue;
        $fechaFin=$fechaFinValue;
        return view('admin-reserva.reservar-ambiente.reservar-bungalow-seleccionarSocio', compact('ambiente','socios','fechaIni','fechaFin'));
    }
    public function seleccionarSocioOtrosAmbientesAdminR($id,$fechaIniValue,$fechaFinValue)
    {
        $ambiente = Ambiente::find($id);
        $socios = Socio::all();
        $fechaIni=$fechaIniValue;
        $fechaFin=$fechaFinValue;
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes-seleccionarSocio', compact('ambiente','socios','fechaIni','fechaFin'));
    }
    public function reservarBungalowFiltradosAdminR(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = (new Carbon('America/Lima'))->addDays(25);
        $fechaIniValue   = new Carbon('America/Lima');
        $fechaFinValue   = (new Carbon('America/Lima'))->addDays(25);  
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado', '=', 'Activo')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIniValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
            $fechaFinValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
         if(!empty($input['capacidad_actual'])){
            $capacidad=$input['capacidad_actual'];
         }else
            $capacidad=0;

        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva',[$fechaIni,$fechaFin])->get();
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva',[$fechaIni,$fechaFin])->get();
        
        foreach ($ambientes as $i=> $ambiente) {
                if($ambiente->capacidad_actual<$capacidad)  unset($ambientes[$i]);
        }
        if($input['sedeSelec']!=-1){
            $sedeFiltro=$input['sedeSelec'];
            
            foreach ($ambientes as $i=> $ambiente) {
                    if($ambiente->sede->id!=$sedeFiltro)  unset($ambientes[$i]);
            }
        }
        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id)  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
            }
        }
        $bloqueado = false;
        return view('admin-reserva.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue','bloqueado'));
    }
    public function reservarOtrosAmbientesAdminR()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->where('estado', '=', 'Activo')->get();
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);
        $bloqueado = true;
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue','bloqueado'));
    }
    public function reservarOtrosAmbientesFiltradosAdminR(Request $request)
    {

        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = (new Carbon('America/Lima'))->addDays(25);
        $fechaIniValue   = new Carbon('America/Lima');
        $fechaFinValue   = (new Carbon('America/Lima'))->addDays(25); 
        $sedes = Sede::all();
        
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->where('estado', '=', 'Activo')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIniValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
            $fechaFinValue=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
            $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
         if(!empty($input['capacidad_actual'])){
            $capacidad=$input['capacidad_actual'];
         }else
            $capacidad=0;
         /*Se prepara las horas para ser comparadas*/
        $horaInicio=$input['horaInicio'];
        $horaFin=$input['horaFin'];

        if(empty($input['horaInicio'])){
            $horaInicio="00:00";
        }else{

        }
        if(empty($input['horaFin'])){
            $horaFin="23:59" ;
        }else{
            
        }
        /*Se terminó de preparar las horas*/
            
        $reservas_caso_1=Reserva::where('fecha_inicio_reserva','=',$fechaIni )->whereBetween('hora_inicio_reserva',[$horaInicio,$horaFin])->get();

        $reservas_caso_2=Reserva::where('fecha_inicio_reserva','=', $fechaFin)->whereBetween('hora_fin_reserva',[$horaInicio,$horaFin])->get();
        foreach ($ambientes as $i=> $ambiente) {
                if($ambiente->capacidad_actual<$capacidad)  unset($ambientes[$i]);
        }
        if($input['sedeSelec']!=-1){
            $sedeFiltro=$input['sedeSelec'];
            
            foreach ($ambientes as $i=> $ambiente) {
                    if($ambiente->sede->id!=$sedeFiltro)  unset($ambientes[$i]);
            }
        }
        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id)  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
            }
        }
        $bloqueado = false;
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue','bloqueado'));
        
    }

    public function createBungalowAdminR($idambiente,$idsocio,$fechaIni,$fechaFin)
    {   
        $ambiente = Ambiente::find($idambiente);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $socio = Socio::find($idsocio);
        $persona = $socio->postulante->persona;  
        $tipo_persona = $persona->tipopersona->id;
        $fechaI=$fechaIni;
        $fechaF=$fechaFin;
        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente','tipo_comprobantes','socio', 'tipo_persona','fechaI','fechaF'));
    }

    //Se muestra el Bungalow a reservar y espera su confirmacion para la reserva
    public function storeBungalowAdminR($idambiente, $idsocio, StoreReservaBungalowAdminR $request)
    {
        $ambiente_id = $idambiente;
        $socio = Socio::find($idsocio);
        $persona_id = $socio->postulante->persona->id;

        $input = $request->all();
        $carbon=new Carbon(); 

        $reserva = new Reserva();
        $reserva->ambiente_id = $ambiente_id;
        $persona_id = $input['id_persona'];
        $reserva->id_persona = $persona_id;
        

        if (empty($input['fecha_inicio_reserva'])) {
            $reserva->fecha_inicio_reserva="";
        }else{
            $fecha_inicio = str_replace('/', '-', $input['fecha_inicio_reserva']);      
            $reserva->fecha_inicio_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
        }

        if (empty($input['fecha_fin_reserva'])) {
            $reserva->fecha_fin_reserva="";
        }else{
            $fecha_fin = str_replace('/', '-', $input['fecha_fin_reserva']);      
            $reserva->fecha_fin_reserva=$carbon->createFromFormat('d-m-Y', $fecha_fin)->toDateString();
        }

        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_inicio_reserva="";
        }else{
            $reserva->hora_inicio_reserva=Carbon::createFromTime(0, 0, 0);            
        }


        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_fin_reserva="";
        }else{
            $reserva->hora_fin_reserva=Carbon::createFromTime(0, 0, 0);
        }
        $fechaIniValue=$carbon->createFromFormat('d-m-Y', $fecha_inicio);
        $fechaFinValue=$carbon->createFromFormat('d-m-Y', $fecha_fin);
        $diff=$fechaFinValue->diffInDays($fechaIniValue);
        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio*$diff;        
        }
        //$reserva->precio = 0;

        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;
        
        $reserva->save();

        $facturacion = new Facturacion();
        $facturacion->persona_id = $persona_id;
        $facturacion->reserva_id = $reserva->id;
        $facturacion->tipo_comprobante = $input['tipo_comprobante'];
        $nombreReserva = $reserva->ambiente->nombre;
        $facturacion->descripcion = "Reserva de $nombreReserva";
        $facturacion->total = $reserva->precio;
        $facturacion->tipo_pago = "No se ha cancelado";
        $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
        $facturacion->estado = $estado->valor;

        $facturacion->save();

        return redirect('reservar-ambiente/reservar-bungalow-adminR')->with('stored', 'Se registró la reserva del bungalow correctamente.');        
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva

    public function createOtroTipoAmbienteAdminR($idambiente, $idsocio,$fechaIni,$fechaFin)
    {   
        $ambiente = Ambiente::find($idambiente);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $socio = Socio::find($idsocio);
        $persona = $socio->postulante->persona;  
        $tipo_persona = $persona->tipopersona->id;
        $fechaI=$fechaIni;
        $fechaF=$fechaFin;
        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente','tipo_comprobantes','socio', 'tipo_persona','fechaI','fechaF'));
    }
    
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function storeOtroTipoAmbienteAdminR($idambiente, $idsocio, StoreReservaOtroAmbienteAdminR $request)
    {
        
        $ambiente_id = $idambiente;
        $socio = Socio::find($idsocio);
        $persona_id = $socio->postulante->persona->id;

        $input = $request->all();
        $carbon=new Carbon(); 

        $reserva = new Reserva();
        $reserva->ambiente_id = $ambiente_id;
        $persona_id = $input['id_persona'];
        $reserva->id_persona = $persona_id;
        

        if (empty($input['fecha_inicio_reserva'])) {
            $reserva->fecha_inicio_reserva="";
        }else{
            $fecha_inicio = str_replace('/', '-', $input['fecha_inicio_reserva']);      
            $reserva->fecha_inicio_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
            $reserva->fecha_fin_reserva=$carbon->createFromFormat('d-m-Y', $fecha_inicio)->toDateString();
        }
        
        if (empty($input['hora_inicio_reserva'])) {
            $reserva->hora_inicio_reserva="";
        }else{
            $reserva->hora_inicio_reserva=$carbon->createFromFormat('H:i', $input['hora_inicio_reserva'])->toTimeString();
        }


        if (empty($input['hora_fin_reserva'])) {
            $reserva->hora_fin_reserva="";
        }else{
            $reserva->hora_fin_reserva=$carbon->createFromFormat('H:i', $input['hora_fin_reserva'])->toTimeString();
        }
        $horaIniValue=$carbon->createFromFormat('H:i', $input['hora_inicio_reserva']);
        $horaFinValue=$carbon->createFromFormat('H:i', $input['hora_fin_reserva']);
        $diff=$horaFinValue->diffInHours($horaIniValue);
        
        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio*$diff;        
        }
        //$reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;


        $reserva->save();

        $facturacion = new Facturacion();
        $facturacion->persona_id = $persona_id;
        $facturacion->reserva_id = $reserva->id;
        $facturacion->tipo_comprobante = $input['tipo_comprobante'];
        $nombreReserva = $reserva->ambiente->nombre;
        $facturacion->descripcion = "Reserva de $nombreReserva";
        $facturacion->total = $reserva->precio;
        $facturacion->tipo_pago = "No se ha cancelado";
        $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
        $facturacion->estado = $estado->valor;

        $facturacion->save();
        return redirect('reservar-ambiente/reservar-otros-ambientes-adminR')->with('stored', 'Se registró la reserva del ambiente correctamente.');
    }

     public function searchSocioAdminR() // va  a la lista de los socios
    {
        
        return view('admin-reserva.persona.socio.buscarSocio');
    }
    public function consultarReservaBungalowAdminR()
    {
        $reservas = Reserva::all();
        $socios = Socio::all();
        
        return view('admin-reserva.reservar-ambiente.consultar-reserva-bungalow',compact('reservas', 'socios'));
    }
    public function consultarReservaOtroAmbienteAdminR()
    {
        $reservas = Reserva::all();
        $socios = Socio::all();
        

        return view('admin-reserva.reservar-ambiente.consultar-reserva-otros-ambientes',compact('reservas', 'socios'));
    }


       
}
