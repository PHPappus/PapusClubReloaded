<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests\StoreCuotaRequest;
use papusclub\Models\Cuota;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use Log;

class CuotaController extends Controller
{
    public function index()
    {
        try
        {
            $cuotas = Cuota::all();
            return view('admin-pagos.cuota-extraordinaria.index',compact('cuotas'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }
    }

    public function create()
    {

        try
        {
            $socios = Socio::all();
            return view('admin-pagos.cuota-extraordinaria.newCuota',compact('socios'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }
    	
    }

    public function store(StoreCuotaRequest $request)
    {

        try
        {
            $input = $request->all();
            $personas = $input['ch'];

            $cuota = new Cuota();
            $cuota->nombre = $input['nombre'];
            $cuota->motivo = $input['motivo'];
            $cuota->monto = $input['monto'];
            $cuota->estado = TRUE;

            $cuota->save();

            foreach ($personas as $persona) {
            
                $socio = Socio::find($persona);

                $facturacion = new Facturacion();
                $facturacion->persona_id = $socio->postulante->persona->id;
                $facturacion->cuota_id = $cuota->id;
                $facturacion->tipo_comprobante = "Boleta";
                $facturacion->descripcion = $cuota->motivo;
                $facturacion->total = $cuota->monto;
                $facturacion->tipo_pago = "No se ha cancelado";
                $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
                $facturacion->estado = $estado->valor;

                $facturacion->save();

             }

            return redirect('cuota-extra')->with('stored', 'Se registró la cuota correctamente.');
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
            $cuota = Cuota::find($id);
            return view('admin-pagos.cuota-extraordinaria.showCuota',compact('cuota'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }


    public function destroy(Cuota $cuota)
    {

        try
        {
            $cuota->forceDelete();
            return back();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));  
        }

        
    }

}
