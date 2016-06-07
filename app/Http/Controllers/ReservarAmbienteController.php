<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Models\Reserva;


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
    public function storeOtroTipoAmbiente($id)
    {

       
        $ambiente = Ambiente::find($id); // de aqui sacare el id de la sede :S

        return view('admin-general.reservar-ambiente.confirmacion-reserva-otro-ambiente',compact('ambiente'));
    }
       
}
