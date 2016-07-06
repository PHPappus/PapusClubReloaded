<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class SocioSuspendidoController extends Controller
{
    public function index()
    {
        return view('socio-suspendido.inicio-al-socio-suspendido');
    }
}
