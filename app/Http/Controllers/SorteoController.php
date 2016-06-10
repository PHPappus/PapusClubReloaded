<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Sorteo;
use papusclub\Models\Ambiente;
use papusclub\Models\Reserva;
use papusclub\Models\AmbientexSorteo;
use papusclub\Http\Requests\EditSorteoRequest;
use papusclub\Http\Requests\StoreSorteoRequest;
use papusclub\Http\Requests\StoreAmbientexSorteoRequest;


use Carbon\Carbon;

class SorteoController extends Controller
{
    public function index()
    {
        $sorteos=Sorteo::all();
        $carbon=new Carbon();
        foreach ($sorteos as $sorteo) {
            $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
            $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');
        }
        return view('admin-general.sorteo.index',['sorteos'=>$sorteos]);        
    }

    public function create()
    {
        return view('admin-general.sorteo.newSorteo');
    }


    public function storeBungalows(StoreAmbientexSorteoRequest $request, $id){
        $bungalows = Input::get('ch');
        $sorteo=Sorteo::where('id',$id)->first();
        foreach ($bungalows as $bungalow) {
            $ambienteXsorteo=new AmbientexSorteo();
            $ambienteXsorteo->id_sorteo=$id;
            $ambienteXsorteo->id_ambiente=$bungalow;
            $ambienteXsorteo->save();

            $reserva=new Reserva();
            $reserva->fecha_inicio_reserva=$sorteo->fecha_abierto;
            $reserva->fecha_fin_reserva=$sorteo->fecha_cerrado;
            $reserva->sede_id=1;
            $reserva->ambiente_id=$bungalow;
            $reserva->persona_id=1;
            $reserva->precio=70.8;
            $reserva->estadoReserva='Activo';
            $reserva->save();
        }
        return redirect('sorteo/index')->with('stored', 'Se registró el producto correctamente.');
        //return view('admin-general.sorteo.prueba',['nombres'=>$bungalows]);
    }

    public function show($id)
    {
        $sorteo=Sorteo::where('id',$id)->first();
        $carbon=new Carbon();
        $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
        $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');

        $lista_bungalows=AmbientexSorteo::where('id_sorteo','=',$id)->get();        

        foreach ($lista_bungalows as $temp) {
            $ambiente_temp=Ambiente::where('id','=',$temp->id_ambiente)->get();
            $id_temp_cochino=$temp->id_ambiente;
            $collection=collect([$ambiente_temp]);
            break;
        }

        foreach ($lista_bungalows as $bungalow_spec) {            
            if($id_temp_cochino!=$bungalow_spec->id_ambiente){
                $ambiente=Ambiente::where('id','=',$bungalow_spec->id_ambiente)->get();
                $collection->push($ambiente);
            }
            
        }
        $ambientes=$collection->all();
        return view('admin-general.sorteo.detailSorteo',['sorteo'=>$sorteo],['ambientes'=>$ambientes]);
    }

    public function store(StoreSorteoRequest $request)
    {
        $input = $request->all();
        $sorteo= new Sorteo();
        $carbon=new Carbon(); 

        $sorteo->nombre_sorteo=$input['nombre_sorteo'];
        $sorteo->descripcion=$input['descripcion'];

        $date = str_replace('/', '-', $input['fecha_abierto']);      
        $sorteo->fecha_abierto=$carbon->createFromFormat('d-m-Y', $date)->toDateString();

        $date = str_replace('/', '-', $input['fecha_cerrado']);      
        $sorteo->fecha_cerrado=$carbon->createFromFormat('d-m-Y', $date)->toDateString();
        
        $sorteo->save();
        //return redirect('sorteo/new/sorteo/bungalows');//->with('stored', 'Se registró el producto correctamente.'); ,['sorteo'=>$sorteo]
        return redirect()->action('SorteoController@bungalows',['id'=>$sorteo->id]);//->route('sorteo/new/sorteo/bungalows',[$sorteo]);
    }

    public function bungalows($id){
        $sorteo = Sorteo::find($id);
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();

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

       public function edit($id)
    {
        $sorteo=Sorteo::where('id',$id)->first();
        $carbon=new Carbon();
        $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
        $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');
        return view('admin-general.sorteo.editSorteo',['datos'=>$sorteo]);
    }

    public function update(EditSorteoRequest $request, $id)
    {
        $input = $request->all();
        $sorteo = Sorteo::find($id);

        $carbon=new Carbon();

        $sorteo->nombre_sorteo = $input['nombre_sorteo'];
        $sorteo->descripcion = $input['descripcion'];        
		
        $date = str_replace('/', '-', $input['fecha_abierto']);      
        $sorteo->fecha_abierto=$carbon->createFromFormat('d-m-Y', $date)->toDateString();

        $date = str_replace('/', '-', $input['fecha_cerrado']);      
        $sorteo->fecha_cerrado=$carbon->createFromFormat('d-m-Y', $date)->toDateString();       

        $sorteo->save();
        return redirect('sorteo/index')->with('stored', 'Se actualizó el producto correctamente.');
    }

    public function destroy($id)
    {
        $sorteo=Sorteo::find($id);
        $sorteo->delete();
        return redirect('sorteo/index');
    }
}
