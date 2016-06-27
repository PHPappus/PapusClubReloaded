<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Configuracion;
use papusclub\Http\Controllers\Controller;

class ConfiguracionController extends Controller
{
    public function index()
    {
    	$variables=Configuracion::all();
        return view('admin-general.configuracion.pantallaConfiguracion',compact('variables'));
    }
}