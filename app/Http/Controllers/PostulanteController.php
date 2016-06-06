<?php

namespace papusclub\Http\Controllers;

use papusclub\Models\Postulante;


use Illuminate\Http\Request;

use papusclub\Http\Requests;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return view('admin-general.persona.postulante.index',compact('postulantes'));
    }

    public function buscar()
    {
        return view('admin-general.persona.postulante.buscar-postulante');
    }

    public function registrar()
    {
        return view('admin-general.persona.postulante.registrar-postulante');
    }
}
