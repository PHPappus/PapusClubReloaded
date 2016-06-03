<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Sorteo;
use papusclub\Models\Ambiente;
use papusclub\Http\Requests\EditSorteoRequest;
use papusclub\Http\Requests\StoreSorteoRequest;

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
        $ambientes=Ambiente::all()->where('tipo',"Bungalow");
        //$ambientes=Ambiente::all();
        return view('admin-general.sorteo.newSorteo',['ambientes'=>$ambientes]);
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
        return redirect('sorteo/index')->with('stored', 'Se registró el producto correctamente.');
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
        return back();
    }
}
