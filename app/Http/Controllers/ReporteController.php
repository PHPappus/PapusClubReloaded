<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Models\Persona;
use papusclub\Models\Sede;
use Auth;
use papusclub\User;

class ReporteController extends Controller
{
    //REporte1 : Cuantos invitados hubo por sede por mes
    public function reporte1() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-invitados-por-sede',compact('sedes'));
    }
     public function reporte1Final() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-invitados-por-sede-final',compact('sedes'));
    }
    //Reporte 2: cuantas personas deben dentro de un rango de fecha
    public function reporte2() 
    {
        $sedes = Sede::all();   
        return view('gerente.reportes.reporte-morosos',compact('sedes'));
    }
     public function reporte2Final() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-morosos-final',compact('sedes'));
    }
    //Reporte 3:cuantas veces se reserva un bunalow en un rango de fecha 
    public function reporte3() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-reservas-de-bungalow',compact('sedes'));
    }
     public function reporte3Final() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-reservas-de-bungalow-final',compact('sedes'));
    }
}
