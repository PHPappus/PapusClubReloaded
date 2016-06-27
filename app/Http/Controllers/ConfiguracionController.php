<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('admin-general.configuracion.pantallaConfiguracion');
    }
}