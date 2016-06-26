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

use papusclub\Http\Requests\BuscarPersonaRequest;
use papusclub\Http\Requests\RegistrarPagoIngresoRequest;

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
        $facturacion->tipo_pago = $input['tipo_pago'];
        $facturacion->estado = $estado_facturacion->valor;
        $facturacion->update();

        return redirect('pagos/pago-seleccionar-socio')->with('stored', 'Se registró la facturacion correctamente.');
    }
     public function showSocio($id)
    {
        $facturacion = Facturacion::find($id);
        return view('admin-pagos.pagos.detail-pago', compact('facturacion'));
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
     public function showAlSocio($id)
    {
        $facturacion = Facturacion::find($id);
        return view('socio.pagos.detail-pago',compact('facturacion'));
    }

    public function buscarpersona()
    {
        $sedes = Sede::all();
        return view('admin-pagos.ingreso.busqueda',compact('sedes'));
    }

    public function resultadopersona(BuscarPersonaRequest $request)
    {
        $input = $request->all();

        $documento = $input['documento'];
        $numerodoc=$input['numerodoc'];

        $persona=null;
        if($documento == 'DNI')
        {
            $match = ['doc_identidad'=>$numerodoc];
            $persona = Persona::where($match)->first();
        }
        else
        {
            $match = ['carnet_extranjeria'=>$numerodoc];
            $persona = Persona::where($match)->first();
        }

        if($persona==null)
        {
            Session::flash('resultado','noencontrado');
        }
        else
        {
            Session::flash('resultado','encontrado');
        }

        $tipopagos = Configuracion::where('grupo','=','8')->get();
        $comprobantes = Configuracion::where('grupo','=','10')->get();

        //return Redirect::action('PagosController@resultadoPago', array('persona' => $persona,'tipopagos'=>$tipopagos,'comprobantes'=>$comprobantes));
        return view('admin-pagos.ingreso.registrarPago',compact('persona','tipopagos','comprobantes'));
        //return Redirect::to('resultado-busqueda-persona')->with('persona',$persona)->with('tipopagos',$tipopagos)->with('comprobantes',$comprobantes);       
    }

    /*public function resultadomostrar()
    {
        $persona = Session::get('persona');
        $tipopagos = Session::get('tipopagos');
        $comprobantes = Session::get('comprobantes');

        return view('admin-pagos.ingreso.registrarPago',compact('persona','tipopagos','comprobantes'));
    }*/

    public function registrarPagoIngreso(RegistrarPagoIngresoRequest $request)
    {
        $input = $request->all();

        $persona = null;
        if(isset($input['dni']))
        {
            $numerodoc=$input['dni'];
            $match = ['doc_identidad'=>$numerodoc];
            $persona = Persona::where($match)->first();
        }
        else
        {
            $numerodoc=$input['carnet'];
            $match = ['carnet_extranjeria'=>$numerodoc];
            $persona = Persona::where($match)->first();
        }

        if($persona!=null)
        {
            $monto = $input['monto'];
            $tipo_pago_id = $input['tipo_pago_id'];
            $comprobante=$input['comprobante'];
            $numero = $input['numero'];
            $descripcion = $input['descripcion'];

            /*Buscando en la tabla configuraciones*/
            $tipopago = Configuracion::find($tipo_pago_id);
            $tipo=$tipopago->valor;

            $comprobanteObject = Configuracion::find($comprobante);
            $comprobante=$comprobanteObject->valor;

            $estado = 'Pagado';

            /*Registrando la factura*/
            $facturacion = new Facturacion();
            $facturacion->persona_id=$persona->id;
            $facturacion->total=$monto;
            $facturacion->tipo_pago=$tipo;
            $facturacion->tipo_comprobante=$comprobante;
            $facturacion->numero_pago=$numero;
            $facturacion->descripcion=$descripcion;
            $facturacion->estado=$estado;
            $facturacion->save();

            return redirect('/ingreso/busqueda')->with('stored', 'Se registró el pago de manera exitosa.');
        }
        else
        {
            return redirect('/ingreso/busqueda')->with('stored', 'No se pudo registrar el pago debido a un error inesperado, vuelva a intentar nuevamente.');
        }
    }
}
