<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;

class PostulanteController extends Controller
{
    public function index()
    {
        return view('admin-general.persona.postulante.index');
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
