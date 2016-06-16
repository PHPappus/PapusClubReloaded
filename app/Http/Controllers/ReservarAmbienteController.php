<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\User;
use papusclub\Models\Reserva;
use papusclub\Http\Requests\StoreReservaAmbiente;
use Auth;
use Session;
use Carbon\Carbon;

class ReservarAmbienteController extends Controller
{
    //Muestra la pantalla para realizar la reserva de un bungalow
    public function reservarBungalow()
    {
        $sedes = Sede::all();
        //$ambientes = Ambiente::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();  
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes'));
    }
    public function reservarBungalowFiltrados(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
        $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
        $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();

        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva',[$fechaIni,$fechaFin])->get();
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva',[$fechaIni,$fechaFin])->get();

        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id || $ambiente->capacidad_actual<$input['capacidad_actual'] )  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id ||$ambiente->capacidad_actual<$input['capacidad_actual']) unset($ambientes[$i]);
                
            }
        }
        return view('socio.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes'));
    }
    //Muestra la pantalla para realizar la reserva de un ambiente que no sea bungalow
    public function reservarOtrosAmbientes()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
    }

    public function reservarOtrosAmbientesFiltrados(Request $request)
    {

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
        $fecha=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();

        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();

        $reservas_caso_1=Reserva::where('fecha_inicio_reserva','=',$fecha )->whereBetween('hora_inicio_reserva',[$input['horaInicio'],$input['horaFin']])->get();

        $reservas_caso_2=Reserva::where('fecha_inicio_reserva','=', $fecha)->whereBetween('fecha_fin_reserva', [$input['horaInicio'], $input['horaFin']])->get();

        //$reservas_caso_3=Reserva::where('fecha_inicio_reserva','!=',$fecha)->get();

        // echo $fecha;
        // echo $reservas_caso_1;
        // echo $reservas_caso_2;
        //echo $reservas_caso_3;
        //return exit;
        
        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id || $ambiente->capacidad_actual< $input['capacidad_actual'])  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id || $ambiente->capacidad_actual< $input['capacidad_actual']) unset($ambientes[$i]);
                
            }
        }
        // foreach ($ambientes as $i => $ambiente) {
        //      foreach ($reservas_caso_3 as  $reserva) {
        //         if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
        //     }
        // }
        return view('socio.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
        
    }

    public function createBungalow($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('socio.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente'));
    }

    //Se muestra el Bungalow a reservar y espera su confirmacion para la reserva
    public function storeBungalow($id, StoreReservaAmbiente $request)
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
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

        $reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;
        
        $reserva->save();

        return redirect('reservar-ambiente/reservar-bungalow')->with('stored', 'Se registró la reserva del bungalow correctamente.');        
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva

    public function createOtroTipoAmbiente($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('socio.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente'));
    }

     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function storeOtroTipoAmbiente($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
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

        $reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;


        $reserva->save();
        return redirect('reservar-ambiente/reservar-otros-ambientes')->with('stored', 'Se registró la reserva del ambiente correctamente.');
    }

     public function searchSocio() // va  a la lista de los socios
    {
        
        return view('socio.persona.socio.buscarSocio');
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
    public function reservarBungalowFiltradosR(Request $request){

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
        $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
        $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();

        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva',[$fechaIni,$fechaFin])->get();
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva',[$fechaIni,$fechaFin])->get();

        foreach ($ambientes as $i=> $ambiente) {
            foreach ($reservas_caso_1 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id || $ambiente->capacidad_actual<$input['capacidad_actual'] )  unset($ambientes[$i]);
                
            }
        }
        foreach ($ambientes as $i => $ambiente) {
             foreach ($reservas_caso_2 as  $reserva) {
                if($reserva->ambiente_id==$ambiente->id ||$ambiente->capacidad_actual<$input['capacidad_actual']) unset($ambientes[$i]);
                
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

        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon();
        $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
        $fecha=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();

        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();

        $reservas_caso_1=Reserva::where('fecha_inicio_reserva','=',$fecha )->whereBetween('hora_inicio_reserva',[$input['horaInicio'],$input['horaFin']])->get();

        $reservas_caso_2=Reserva::where('fecha_inicio_reserva','=', $fecha)->whereBetween('fecha_fin_reserva', [$input['horaInicio'], $input['horaFin']])->get();

        //$reservas_caso_3=Reserva::where('fecha_inicio_reserva','!=',$fecha)->get();

        // echo $fecha;
        // echo $reservas_caso_1;
        // echo $reservas_caso_2;
        //echo $reservas_caso_3;
        //return exit;
        
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
        // foreach ($ambientes as $i => $ambiente) {
        //      foreach ($reservas_caso_3 as  $reserva) {
        //         if($reserva->ambiente_id==$ambiente->id) unset($ambientes[$i]);
                
        //     }
        // }
        return view('admin-reserva.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
        
    }

    public function createBungalowAdminR($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente'));
    }

    //Se muestra el Bungalow a reservar y espera su confirmacion para la reserva
    public function storeBungalowAdminR($id, StoreReservaAmbiente $request)
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
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

        $reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;
        
        $reserva->save();

        return redirect('reservar-ambiente/reservar-bungalow')->with('stored', 'Se registró la reserva del bungalow correctamente.');        
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva

    public function createOtroTipoAmbienteAdminR($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('admin-reserva.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente'));
    }
    
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function storeOtroTipoAmbienteAdminR($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
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

        $reserva->precio = 0;
        $reserva->estadoReserva = "En proceso";
        $reserva->actividad_id = null;


        $reserva->save();
        return redirect('reservar-ambiente/reservar-otros-ambientes')->with('stored', 'Se registró la reserva del ambiente correctamente.');
    }

     public function searchSocioAdminR() // va  a la lista de los socios
    {
        
        return view('admin-reserva.persona.socio.buscarSocio');
    }


       
}
