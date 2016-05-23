<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Sorteo;
use papusclub\Http\Requests\EditSorteoRequest;
use papusclub\Http\Requests\StoreSorteoRequest;

use Carbon\Carbon;

class SorteoController extends Controller
{
    public function showSorteo()
    {
        $sorteo=Sorteo::all();
        return view('admin-general.sorteo.mostrar_sorteo',['sorteos'=>$sorteo]);        
    }

    public function showEditSorteo($id)
    {
    	$sorteo=Sorteo::where('id',$id)->first();
    	return view('admin-general.sorteo.modificar_sorteo',['datos'=>$sorteo]);
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
        return redirect()->action('SorteoController@showSorteo');
    }

    public function update(EditSorteoRequest $request, $id)
    {
        $input = $request->all();
        $sorteo = Sorteo::find($id);

        $sorteo->nombre_sorteo = $input['nombre_sorteo'];
        $sorteo->descripcion = $input['descripcion'];        
		
        $date = str_replace('/', '-', $input['fecha_abierto']);      
        $sorteo->fecha_abierto=$carbon->createFromFormat('d-m-Y', $date)->toDateString();

        $date = str_replace('/', '-', $input['fecha_cerrado']);      
        $sorteo->fecha_cerrado=$carbon->createFromFormat('d-m-Y', $date)->toDateString();       

        $sorteo->save();
        return redirect()->action('SorteoController@showSorteo');
    }
}
