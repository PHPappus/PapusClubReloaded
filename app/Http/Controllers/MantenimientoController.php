<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Reserva;
use papusclub\Models\Sede;
use papusclub\Http\Requests\StoreMantenimientoRequest;

class MantenimientoController extends Controller
{
    public function indexPrev()
    {
        $sedes = Sede::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
        return view('admin-general.mantenimiento-bungalows.indexPrev',['ambientes'=>$ambientes,'sedes'=>$sedes]);
    }

    public function bungalowsDisponibles(StoreMantenimientoRequest $request)
    {
        $input=$request->all();
        /*echo $input['fecha_abierto'];
        echo $input['fecha_cerrado'];
        echo $input['sedeSelec'];*/
        
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('sede_id','=',$input['sedeSelec'])->where('estado','=','Activo')->get();

        //las reservas inician en el rango del sorteo
        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //las reservas terminan en el rango del sorteo
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //$reservas_caso_2=Reserva::where('fecha_fin_reserva','>=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','<=',$sorteo->fecha_cerrado)->get();
        //El rango del sorteo encierra una reserva
        $reservas_caso_3=Reserva::where('fecha_inicio_reserva','<=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','>=',$sorteo->fecha_cerrado)->get();
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_1 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_2 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_3 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        return view('admin-general.sorteo.newSorteoBungalows',['sorteo'=>$sorteo],['ambientes'=>$ambientes]);
    }

    public function indexCorr()
    {

    }
}
