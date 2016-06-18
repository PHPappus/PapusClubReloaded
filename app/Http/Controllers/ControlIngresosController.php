<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

class ControlIngresosController extends Controller
{
    public function index()
    {
        return view('control-ingresos.inicio-al-control-ingresos');
    }
}
