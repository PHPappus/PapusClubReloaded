<?php

namespace papusclub\Http\Controllers;

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

    public function registrar()
    {
        return view('admin-general.persona.postulante.newPostulante');
    }
}
