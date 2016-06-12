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
        return view('admin-general.reservar-ambiente.reservar-bungalow', compact('sedes'),compact('ambientes'));
    }
     //Muestra la pantalla para realizar la reserva de un ambiente que no sea bungalow
    public function reservarOtrosAmbientes()
    {

        $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        return view('admin-general.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
    }
    public function reservarOtrosAmbientesFiltrados($request)
    {
        
         $sedes = Sede::all();
        //$ambientes = Ambiente::all(); 
        $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
        return view('admin-general.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
        // $input=$request->all();
        // $sedes=Sede::all();
        // $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')->get();
            // ->whereHas('reservas',function ($query){
            //         $query->where('fecha_inicio_reserva','<',$input['fecha_inicio']);
            //         $query->where('fecha_fin_reserva','<',$input['fecha_inicio']);
            //   })->orwhereHas('reservas',function ($query){
            //         $query->where('fecha_inicio_reserva','>',$input['fecha_fin']);
            //         $query->where('fecha_fin_reserva','>',$input['fecha_fin']);

            //   })->get();
        // if(!empty($input['fecha_inicio'])){
        //     $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')
        //     ->whereHas('reservas',function ($query){
        //             $query->where('fecha_inicio_reserva','<',$input['fecha_inicio']);
        //             $query->where('fecha_fin_reserva','<',$input['fecha_inicio']);
        //       })->orwhereHas('reservas',function ($query){
        //             $query->where('fecha_inicio_reserva','>',$input['fecha_fin']);
        //             $query->where('fecha_fin_reserva','>',$input['fecha_fin']);

        //       })->get();
        // }else{
        //     $fecha=Carbon::now();
        //     $ambientes=Ambiente::where('tipo_ambiente','!=','Bungalow')
        //     ->whereHas('reservas',function ($query){
        //             $query->where('fecha_inicio_reserva','<',$fecha);
        //             $query->where('fecha_fin_reserva','<',$fecha);

        //       })->orwhereHas('reservas',function ($query){
        //             $query->where('fecha_inicio_reserva','>',$fecha);
        //             $query->where('fecha_fin_reserva','>',$fecha);

        //       })->get();
        // }

        // return view('admin-general.reservar-ambiente.reservar-otros-ambientes', compact('sedes'),compact('ambientes'));
    }

    public function createBungalow($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('admin-general.reservar-ambiente.confirmacion-reserva-bungalow', compact('ambiente'));
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
        
        $reserva->save();

        return redirect('reservar-ambiente/reservar-bungalow')->with('stored', 'Se registró la reserva del bungalow correctamente.');        
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva

    public function createOtroTipoAmbiente($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('admin-general.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente'));
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


        $reserva->save();
        return redirect('reservar-ambiente/reservar-otros-ambientes')->with('stored', 'Se registró la reserva del ambiente correctamente.');
    }

     public function searchSocio() // va  a la lista de los socios
    {
        
        return view('admin-general.persona.socio.buscarSocio');
    }
       
}
