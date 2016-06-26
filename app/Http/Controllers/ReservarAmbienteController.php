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

class ReservarAmbienteController extends Controller
{   
    public function  storeServices(StoreAgregarServiciosRequest $request, $id){
        
        return view('admin-reserva.reservar-ambiente.store-services');
    }
    public function agregarServices($id){
        $reserva = Reserva::find($id);
        $iddesede = $reserva->ambiente->sede->id;
        $sede = Sede::find($iddesede);
        
        $tiposServicio=Configuracion::where('grupo','=','4')->get();        
        $serviciosdesede = Sedexservicio::where('idsede','=',$sede->id)->get();
        $serviciostodos = Servicio::all();

        $servicios=array();

        foreach ($serviciostodos as $sv) {
            $foo = false;
            foreach ($serviciosdesede as $servdsede) {
                    if ($sv->id == $servdsede->idservicio  ){
                        $foo = True;
                        break;      
                    }
            }            
            if ($foo) {
                array_push($servicios,$sv);
            }            
        }
        
        return view('admin-reserva.reservar-ambiente.agregar-servicios',compact('id','iddesede','servicios','tiposServicio','serviciosdesede'));
    }
    //Muestra la pantalla para realizar la reserva de un bungalow
    public function reservarBungalow()
    {
        $sedes = Sede::all();
        //$ambientes = Ambiente::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();  
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue'));
    }
    public function reservarBungalowFiltrados(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = (new Carbon('America/Lima'))->addDays(25);
        $fechaIniValue   = new Carbon('America/Lima');
        $fechaFinValue   = (new Carbon('America/Lima'))->addDays(25); 
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
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
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue'));
    }
    //Muestra la pantalla para realizar la reserva de un ambiente que no sea bungalow
    public function reservarOtrosAmbientes()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        $fechaIniValue=(new Carbon('America/Lima'));  
        $fechaFinValue=(new Carbon('America/Lima'))->addDays(30);
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue'));
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
        
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
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
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes','fechaIniValue','fechaFinValue'));
        
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

        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio;        
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

        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio;        
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
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();  
        return view('admin-reserva.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes'));
    }
    public function seleccionarSocioBungalowAdminR($id)
    {
        $ambiente = Ambiente::find($id);
        $socios = Socio::all();
        return view('admin-reserva.reservar-ambiente.reservar-bungalow-seleccionarSocio', compact('ambiente','socios'));
    }
    public function seleccionarSocioOtrosAmbientesAdminR($id)
    {
        $ambiente = Ambiente::find($id);
        $socios = Socio::all();
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes-seleccionarSocio', compact('ambiente','socios'));
    }
    public function reservarBungalowFiltradosAdminR(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = new Carbon('America/Lima'); 
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
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
        return view('admin-reserva.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes'));
    }
     //Muestra la pantalla para realizar la reserva de un ambiente que no sea bungalow
    public function reservarOtrosAmbientesAdminR()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
    }

    public function reservarOtrosAmbientesFiltradosAdminR(Request $request)
    {

        $input = $request->all();
        $carbon=new Carbon();
        $fechaIni   = new Carbon('America/Lima');
        $fechaFin   = new Carbon('America/Lima'); 
        $sedes = Sede::all();
        
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
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
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
        
    }

    public function createBungalowAdminR($idambiente,$idsocio)
    {   
        $ambiente = Ambiente::find($idambiente);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $socio = Socio::find($idsocio);
        $persona = $socio->postulante->persona;  
        $tipo_persona = $persona->tipopersona->id;

        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente','tipo_comprobantes','socio', 'tipo_persona'));
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

        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio;        
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

    public function createOtroTipoAmbienteAdminR($idambiente, $idsocio)
    {   
        $ambiente = Ambiente::find($idambiente);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $socio = Socio::find($idsocio);
        $persona = $socio->postulante->persona;  
        $tipo_persona = $persona->tipopersona->id;
        
        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente','tipo_comprobantes','socio', 'tipo_persona'));
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

        $ambiente = Ambiente::find($ambiente_id);
        $persona = Persona::find($persona_id);
        $tipo_persona = $persona->tipopersona;
        $tarifas = $ambiente->tarifas;
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona == $tipo_persona)
                $reserva->precio = $tarifa->precio;        
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
