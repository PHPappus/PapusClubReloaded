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

    //Se muestra el Bungalow a reservar y espera su confirmacion para la reserva
    public function storeBungalow($id)
    {

        $ambiente = Ambiente::find($id); // de aqui sacare el id de la sede :S
        return view('admin-general.reservar-ambiente.confirmacion-reserva-bungalow',compact('ambiente'));
    }
     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function createOtroTipoAmbiente($id)
    {   
        $ambiente = Ambiente::findOrFail($id);
        return view('admin-general.reservar-ambiente.confirmacion-reserva-otro-ambiente', compact('ambiente'));
    }

     //Se muestra el ambiente  a reservar y espera su confirmacion para la reserva
    public function storeOtroTipoAmbiente($id)
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
        //echo $usuario->id;
        //return exit;
        $persona_id = $usuario->persona->id;        
        $ambiente_id = $id;

        $reserva = new Reserva();
        $reserva->ambiente_id = $ambiente_id;
        $reserva->id_persona = $persona_id;
        $reserva->save();

        return redirect('reservar-ambiente/reservar-otros-ambientes')->with('stored', 'Se registró la reserva correctamente.');
    }
       
}
