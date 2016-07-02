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

class PagosController extends Controller
{

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////                            ADMIN PAGOS //////////////////////////////////////////////////////////////////////////
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function seleccionarSocio()
    {   
        try{
        	$socios = Socio::all();
            return view('admin-pagos.pagos.pago-seleccionar-socio', compact('socios'));
        } catch (\Exception $e) {
            $error = 'seleccionarSocio-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }
     public function selectSocio($id) //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        try {
            $socio = Socio::find($id);
            $persona = $socio->postulante->persona;
            $facturaciones = $persona->facturacion;
           
            return view('admin-pagos.pagos.lista-deudas-del-socio', compact('facturaciones'));
        } catch (\Exception $e) {
            $error = 'seleccionarSocio-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }
  
    
     public function registrarPago($id) /// registro que el socio ya realizo el pago de x producto
    {   
        try {
            $facturacion = Facturacion::find($id);
            $tipo_pagos = Configuracion::where('grupo','=','8')->get();
            $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

            return view('admin-pagos.pagos.registrar-pago', compact('facturacion','tipo_pagos','tipo_comprobantes'));
        } catch (\Exception $e) {
            $error = 'registrarPago-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function storePago(StorePagoRequest $request, $id) /// registro que el socio ya realizo el pago de x producto
    {   
        try {
            $input = $request->all();
            $facturacion = Facturacion::find($id);
            $estado_facturacion = Configuracion::where('grupo', '=', 7)->first();
            $facturacion->numero_pago = $input['numero_pago'];
            $facturacion->tipo_pago = $input['tipo_pago'];
            $facturacion->estado = $estado_facturacion->valor;
            $facturacion->update();
            if ($facturacion->reserva_id) 
            {
                $facturacion->reserva->estadoReserva = "Activo";
                $facturacion->reserva->update();         
            }        


            return redirect('pagos/pago-seleccionar-socio')->with('stored', 'Se registró la facturacion correctamente.');
        } catch (\Exception $e) {
            $error = 'storePago-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }
     public function showSocio($id)
    {
        try {
            $facturacion = Facturacion::find($id);
            return view('admin-pagos.pagos.detail-pago', compact('facturacion'));
        } catch (\Exception $e) {
            $error = 'showSocio-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////                            SOCIO       //////////////////////////////////////////////////////////////////////////
    public function listarFacturacionSocio() //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        
            $user_id = Auth::user()->id;
            $usuario = User::find($user_id);
            $persona = $usuario->persona;  
            $facturaciones = $persona->facturacion;            
            // foreach ($facturaciones as $facturacion) {
            //     if($facturacion->total == 0) {
            //         $facturacion->tipo_pago = "Gratuito";
            //         $facturacion->tipo_comprobante = "Gratuito";
            //         $facturacion->estado = "Pagado";
            //         $facturacion->update();
            //     }

            // }
            return view('socio.pagos.facturacion-socio',compact('facturaciones'));
        
            
    }
     public function showAlSocio($id)
    {
        try {
            $facturacion = Facturacion::find($id);
            return view('socio.pagos.detail-pago',compact('facturacion'));
        } catch (\Exception $e) {
            $error = 'showAlSocio-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function buscarpersona()
    {
        try {
            $sedes = Sede::all();
            return view('admin-pagos.ingreso.busqueda',compact('sedes'));
        } catch (\Exception $e) {
            $error = 'buscarpersona-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function resultadopersona(BuscarPersonaRequest $request)
    {
        try {
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

            return view('admin-pagos.ingreso.registrarPago',compact('persona','tipopagos','comprobantes'));
        } catch (\Exception $e) {
            $error = 'resultadopersona-PagosController';
            return view('errors.corrigeme', compact('error'));
        }  
    }


    public function registrarPagoIngreso(RegistrarPagoIngresoRequest $request)
    {
        try {
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
        } catch (\Exception $e) {
            $error = 'registrarPagoIngreso-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }


    public function registrarDeudasMembresia()
    {
        try {
            $socios = Socio::all();
            foreach ($socios as $socio) 
            {
                $facturacion = new Facturacion();
                $facturacion->persona_id = $socio->postulante->persona->id;
                $facturacion->total=$socio->membresia->tarifa->monto;
                $facturacion->descripcion='Cuota Membresía.';
                $facturacion->estado ='Emitido';
                $facturacion->tipo_comprobante='Boleta';
                $facturacion->save();
            }

            return redirect('pagos/pago-seleccionar-socio/');
        } catch (\Exception $e) {
            $error = 'registrarDeudasMembresia-PagosController';
            return view('errors.corrigeme', compact('error'));
        }
    }
}
