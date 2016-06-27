<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Persona;
use papusclub\Models\Socio;
use papusclub\Models\Reserva;
use papusclub\Http\Requests\ShowReservaSocio;
use papusclub\Http\Requests\EditEstadoReservaRequest;

use Carbon\Carbon;

class ingresoSocioController extends Controller
{
	public function index()
    {
    	$socios = Socio::all();

    	$collection=collect([]);

        if(!$socios->isEmpty()){
            foreach ($socios as $socio) {
                $collection->push($socio->postulante->persona);
            }
        }

        $personas=$collection->all();

        return view('admin-general.ingreso-reserva.index',['personas'=>$personas]);
    }

    public function reservaSocio(ShowReservaSocio $request)
    {
    	$input = $request->all();
        $mytime = Carbon::now();
    	$reservas=Reserva::where('fecha_inicio_reserva','<=',$mytime)->where('fecha_fin_reserva','>=',$mytime)->where('id_persona','=',$input['persona_id'])->where('estadoReserva','!=','Ejecutado')->get();
    	return view('admin-general.ingreso-reserva.reservaSocio',['reservas'=>$reservas]);
    }

    public function cambiarEstado(EditEstadoReservaRequest $request)
    {
    	$reservas = Input::get('ch');
    	foreach ($reservas as $reserva) {
    		$temp=Reserva::find($reserva);
    		$temp->estadoReserva='Ejecutado';
    		$temp->save();
    	}
    	return redirect('ingresoReserva/index');
    }
}