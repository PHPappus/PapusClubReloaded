<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;

class PagosController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function seleccionarSocio()
    {
    	$socios = Socio::all();
        return view('admin-general.pagos.pago-seleccionar-socio',compact('socios'));
    }
    
}
