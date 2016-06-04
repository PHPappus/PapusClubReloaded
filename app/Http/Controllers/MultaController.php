<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Models\Multa;
use papusclub\Http\Requests;
use papusclub\Http\Requests\StoreMultaRequest;
use papusclub\Http\Requests\EditMultaiaRequest;
use papusclub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class MultaController extends Controller
{
    public function index()
    {
        $multas = Multa::all();
        return view('admin-general.multa.index',compact('multas'));
    }

    public function create()
    {
    	return view('admin-general.multa.newMulta');
    }

    public function show(Multa $multa)
    {
        $originalDate = $multa->fecha_registro;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $multa->fecha_registro = $newDate;
        return view('admin-general.multa.showMulta',compact('multa'));
    }

    public function store(StoreMultaRequest $request)
    {
        $input = $request->all();

        $fecha = new DateTime("now");
        $fecha=$fecha->format('Y-m-d');

        $multa = new Multa();
        $multa->descripcion = $input['descripcion'];
        $multa->montoPenalidad = $input['montoPenalidad'];
        $multa->estado = $input['estado'];
        $multa->fecha_registro = $fecha;

        $multa->save();

        return redirect('multa')->with('stored', 'Se registró el producto correctamente.');
        //return back();
    }

    public function edit (Multa $multa)
    {
        return view('admin-general.multa.editMulta',compact('multa'));
    }

    public function update(EditMultaiaRequest $request, Multa $multa)
    {
        $input = $request->all();
        

        $multa->update(['descripcion'=>$input['descripcion'],
                        'montoPenalidad'=>$input['montoPenalidad'],
                        'estado'=>$input['estado']]);

        return Redirect::action('MultaController@index');
    }
}
