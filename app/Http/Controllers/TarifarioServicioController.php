<?php

namespace papusclub\Http\Controllers;
use Illuminate\Http\Request;
use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use DateTime;
use papusclub\Models\TarifarioServicio;
use Log;

class TarifarioServicioController extends Controller
{
   

    public function store(StoreTarifarioServicioRequest $request)
    {
        try{
            $mensaje = 'Se registró el producto correctamente.';
            $input = $request->all();            
            $tarifarioServicio = new TarifarioServicio();
            $tarifarioServicio->idservicio = $input['idservicio'];
            $tarifarioServicio->idtipopersona = $input['idtipopersona'];
            $tarifarioServicio->descripcionparafecha = $input['descripcionparafecha'];
            $tarifarioServicio->precio = $input['precio'];
            $tarifarioServicio->estado = $input['estado'];
            $tarifarioServicio->save();
            /*return redirect('tarifarioServicio/index')->with('mensaje', 'Se registró el servicio correctamente.');*/
            return back();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TarifarioServicioController-store';
            return view('errors.corrigeme', compact('error'));            
        }   
    }
  
}
