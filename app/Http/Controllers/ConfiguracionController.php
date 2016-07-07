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
    	try{
	    	$variables=Configuracion::all();
	        return view('admin-general.configuracion.pantallaConfiguracion',compact('variables'));
	    }catch (\Exception $e)
        {
            $error = 'ConfiguracionController';
            return view('errors.corrigeme', compact('error'));
        }
    }
}