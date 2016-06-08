<?php

namespace papusclub\Http\Controllers;

use papusclub\Models\Postulante;


use Illuminate\Http\Request;
use papusclub\Models\Persona;

use papusclub\Http\Requests;

class PostulanteController extends Controller
{
    public function index()
    {

        $personas=Persona::where('id_tipo_persona','=','2')->get();
        return view('admin-general.persona.postulante.index',compact('personas'));

    }

    public function buscar()
    {
        return view('admin-general.persona.postulante.buscar-postulante');

    }

    public function registrar()
    {
        return view('admin-general.persona.postulante.newPostulante');
    }
}
