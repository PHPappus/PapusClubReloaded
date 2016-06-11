<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;

class PagosController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function seleccionarSocio()
    {
    	$socios = Socio::all();
        return view('admin-general.pagos.pago-seleccionar-socio',compact('socios'));
    }
     public function selectSocio($id) //una vez seleccionado el socio , voy a la sigueiten pantalla que sera las facturas del socio
    {
        $socio = Socio::find($id);
       
        return view('admin-general.pagos.lista-deudas-del-socio', compact('socio'));
    }
  
    
     public function registrarPago() /// registro que el socio ya realizo el pago de x producto
    {   //Deberia buscar el ID de la factura , de donde se sacara el socio y de que fue la deuda
       
        return view('admin-general.pagos.registrar-pago');
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
    
}
