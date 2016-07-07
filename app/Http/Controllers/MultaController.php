<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Models\Multa;
use papusclub\Http\Requests;
use papusclub\Http\Requests\StoreMultaRequest;
use papusclub\Http\Requests\EditMultaRequest;
use papusclub\Models\Configuracion;
use papusclub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Log;


class MultaController extends Controller
{
    public function index()
    {

        try
        {
            $multas = Multa::all();
            return view('admin-general.multa.index',compact('multas'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

    public function indexAll()
    {
        $multas = Multa::withTrashed()->get();
        return view('admin-general.multa.all',compact('multas'));
    }

    public function create()
    {

        try
        {
            $tipos = Configuracion::where('grupo','=',22)->get();
            return view('admin-general.multa.newMulta',compact('tipos'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

    public function show($id)
    {

        try
        {
            $multa = Multa::withTrashed()->find($id);
            $originalDate = $multa->fecha_registro;
            $newDate = date("d-m-Y", strtotime($originalDate));
            $multa->fecha_registro = $newDate;
            $multa = Multa::withTrashed()->find($id);
            return view('admin-general.multa.showMulta',compact('multa'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

    public function store(StoreMultaRequest $request)
    {

        try
        {
            $input = $request->all();

            $fecha = new DateTime("now");
            $fecha=$fecha->format('Y-m-d');

            $multa = new Multa();
            $multa->nombre = $input['nombre'];
            $multa->tipo = $input['tipo'];
            $multa->descripcion = $input['descripcion'];
            $multa->montoPenalidad = $input['montoPenalidad'];
            $multa->estado = TRUE;
            $multa->fecha_registro = $fecha;
            $multa->save();

            return redirect('multa')->with('stored', 'Se registró la multa correctamente.');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }


        
        //return back();
    }

    public function edit ($id)
    {


        try
        {
            $multa = Multa::withTrashed()->find($id);
            $tipos = Configuracion::where('grupo','=',22)->get();
            return view('admin-general.multa.editMulta',compact('multa','tipos'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

    public function update(EditMultaRequest $request, $id)
    {


        try
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

            $multa->tipo = $input['tipo'];

            $multa->save();
            return Redirect::action('MultaController@index');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

    public function destroy(Multa $multa)
    {

        try
        {
            $multa = Multa::withTrashed()->find($id);
            $multa->restore();
            return back();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

            $multa->forceDelete();
            return back();
    }

    public function activate($id)
    {

        try
        {
            $multa = Multa::withTrashed()->find($id);
        $multa->restore();
        return back();;
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

    }
}
