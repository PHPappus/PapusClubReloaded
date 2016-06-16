<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Models\Persona;
use Auth;
use papusclub\User;

class PagosController extends Controller
{

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////                            ADMIN PAGOS //////////////////////////////////////////////////////////////////////////
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function seleccionarSocio()
    {
    	$socios = Socio::all();
        return view('admin-pagos.pagos.pago-seleccionar-socio', compact('socios'));
    }
     public function selectSocio($id) //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        $socio = Socio::find($id);
        $persona = $socio->postulante->persona;
        $facturaciones = $persona->facturacion;
       
        return view('admin-pagos.pagos.lista-deudas-del-socio', compact('facturaciones'));
    }
  
    
     public function registrarPago($id) /// registro que el socio ya realizo el pago de x producto
    {   //Deberia buscar el ID de la factura , de donde se sacara el socio y de que fue la deuda
        $facturacion = Facturacion::find($id);
        $tipo_pagos = Configuracion::where('grupo','=','8')->get();
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        return view('admin-pagos.pagos.registrar-pago', compact('facturacion','tipo_pagos','tipo_comprobantes'));
    }

    public function storePago(Request $request, $id) /// registro que el socio ya realizo el pago de x producto
    {   //Deberia buscar el ID de la factura , de donde se sacara el socio y de que fue la deuda
        $input = $request->all();
        $facturacion = Facturacion::find($id);
        $estado_facturacion = Configuracion::where('grupo', '=', 7)->first();
        $facturacion->numero_pago = $input['numero_pago'];
        $facturacion->estado = $estado_facturacion->valor;
        $facturacion->update();

        return redirect('pagos/pago-seleccionar-socio')->with('stored', 'Se registró la facturacion correctamente.');
    }

    
    //Se guarda la informacion del pago  del ambiente en la BD
    /*public function createPago(EditAmbienteRequest $request, $id)
    {
        $input = $request->all();
        $ambiente = Ambiente::find($id);

        $ambiente->nombre= $input['nombre'];
        $ambiente->capacidad_actual= $input['capacidad_actual'];
        $ambiente->tipo_ambiente= $input['tipo_ambiente'];
        $ambiente->ubicacion= $input['ubicacion'];
        $ambiente->save();
        return redirect('ambiente/index');

    }*/
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////                            SOCIO       //////////////////////////////////////////////////////////////////////////
    public function listarFacturacionSocio() //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
        $persona = $usuario->persona;  
        $facturaciones = $persona->facturacion;
        return view('socio.pagos.facturacion-socio',compact('facturaciones'));
    }
    
}
