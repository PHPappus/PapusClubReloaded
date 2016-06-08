<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Sede;


class InscripcionActividadController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscripcionActividad()
    {
        $sedes = Sede::all();
         $actividades=Actividad::all();
        $ambientes = Ambiente::all();
        

        return view('admin-general.inscripcion-actividad.inscripcion-actividades', compact('sedes'),compact('actividades'));
    }

    //Se muestra la actividad a reservar y espera la confirmacion 
    public function storeInscripcionActividad($id)
    {

        $actividad=Actividad::find($id);// de aqui sacare el id de la sede :S
        return view('admin-general.inscripcion-actividad.confirmacion-inscripcion-actividades',compact('actividad'));
    }
   
       
}
