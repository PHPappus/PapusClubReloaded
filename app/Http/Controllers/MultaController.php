<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Models\Multa;
use papusclub\Http\Requests;
use papusclub\Http\Requests\StoreMultaRequest;
use papusclub\Http\Requests\EditMultaRequest;
use papusclub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class MultaController extends Controller
{
    public function index()
    {
        $multas = Multa::all();
        return view('admin-general.multa.index',compact('multas'));
    }

    public function indexAll()
    {
        $multas = Multa::withTrashed()->get();
        return view('admin-general.multa.all',compact('multas'));
    }

    public function create()
    {
    	return view('admin-general.multa.newMulta');
    }

    public function show($id)
    {

        $multa = Multa::withTrashed()->find($id);
        $originalDate = $multa->fecha_registro;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $multa->fecha_registro = $newDate;
        $multa = Multa::withTrashed()->find($id);
        return view('admin-general.multa.showMulta',compact('multa'));
    }

    public function store(StoreMultaRequest $request)
    {
        $input = $request->all();

        $fecha = new DateTime("now");
        $fecha=$fecha->format('Y-m-d');

        $multa = new Multa();
        $multa->nombre = $input['nombre'];
        $multa->descripcion = $input['descripcion'];
        $multa->montoPenalidad = $input['montoPenalidad'];
        $multa->estado = TRUE;
        $multa->fecha_registro = $fecha;
        $multa->save();

        return redirect('multa')->with('stored', 'Se registró la multa correctamente.');
        //return back();
    }

    public function edit ($id)
    {
        $multa = Multa::withTrashed()->find($id);
        return view('admin-general.multa.editMulta',compact('multa'));
    }

    public function update(EditMultaRequest $request, $id)
    {

        $multa = Multa::withTrashed()->find($id);
        $input = $request->all();
        

        $multa->update(['nombre'=>$input['nombre'],'descripcion'=>$input['descripcion'],
                        'montoPenalidad'=>$input['montoPenalidad']]);
        if (isset($input['estado']))
        {
            $multa->estado = TRUE;
        }
        else
        {
            $multa->estado = FALSE;
        }

        $multa->save();
        return Redirect::action('MultaController@index');
        
    }

    public function destroy(Multa $multa){

            $multa->forceDelete();
            return back();
    }

    public function activate($id)
    {
        $multa = Multa::withTrashed()->find($id);
        $multa->restore();
        return back();
    }
}
