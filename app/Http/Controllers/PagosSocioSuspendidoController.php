<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Models\Persona;
use papusclub\Models\Sede;
use Auth;
use papusclub\User;
use Session;
use Redirect;
use View;
use papusclub\Http\Requests\StorePagoRequest;
use papusclub\Http\Requests\BuscarPersonaRequest;
use papusclub\Http\Requests\RegistrarPagoIngresoRequest;
use papusclub\Http\Requests\RegistrarPagoMembresiaRequest;

use Log;

class PagosSocioSuspendidoController extends Controller
{
    public function showAlSocio($id)
    {
        try {
            $facturacion = Facturacion::find($id);
            return view('socio-suspendido.pagos.detail-pago',compact('facturacion'));
        } catch (\Exception $e) {
            $error = 'PagosSocioSuspendidoController-showAlSocio';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function listarFacturacionSocio() //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        try
        {
            $user_id = Auth::user()->id;
            $usuario = User::find($user_id);
            $persona = $usuario->persona;  
            $facturaciones = $persona->facturacion;            

            return view('socio-suspendido.pagos.facturacion-socio',compact('facturaciones'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'PagosSocioSuspendidoController-listarFacturacionSocio';
            return view('errors.corrigeme', compact('error'));            
        }                
    }
}
