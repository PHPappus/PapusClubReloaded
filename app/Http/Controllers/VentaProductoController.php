<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\ProductoxFacturacion;
use papusclub\Http\Requests\StoreFacturacionRequest;
use papusclub\Http\Requests\EditFacturacionRequest;
use papusclub\Http\Requests\StoreProductoxFacturacionRequest;

class VentaProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
		$facturas = Facturacion::all();        
        return view('admin-general.venta-producto.index', compact('facturas'));
	}	

	public function create()
    {
        $factura = new Facturacion();        
        $configuracion = Configuracion::where('grupo','=','6')
                                ->orWhere('grupo','=','7')->get();
    	return view('admin-general.venta-producto.newVentaProducto', compact('factura'), compact('configuracion'));
    }
    
    public function store(StoreFacturacionRequest $request)
    {    	
    	$input = $request->all();
        $factura = new Facturacion();
    	$factura->persona_id = $input['persona_id'];
		$factura->tipo_pago = $input['tipo_pago'];
		$factura->estado = $input['estado'];		
    	
        $factura->save();	    

        //return redirect('venta-producto/index')->with('stored', 'Se registró el producto correctamente.');
        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }	   

    public function createVentaProducto($id)
    {       
        $factura = Facturacion::find($id);

        return view('admin-general.venta-producto.add', compact('factura'));
    }      

    public function storeVentaProducto(StoreProductoxFacturacionRequest $request)
    {               
        $input = $request->all();
        $productoxfacturacion = new ProductoxFacturacion();
        $productoxfacturacion->producto_id = $input['producto_id'];
        $productoxfacturacion->facturacion_id = $input['facturacion_id'];
        $productoxfacturacion->cantidad = $input['cantidad'];  
        $productoxfacturacion->subtotal = $productoxfacturacion->producto->precioproducto->first()['precio'] * $input['cantidad'];
        $productoxfacturacion->save();

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total + $productoxfacturacion->subtotal;
        $productoxfacturacion->facturacion->save();
        $factura = Facturacion::find($input['facturacion_id']);

        return view('admin-general.venta-producto.addVentaProducto', compact('factura'));
    }      

	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $factura = Facturacion::find($id);
        $estados = Configuracion::where('grupo','=','6')->get();
        return view('admin-general.venta-producto.editVentaProducto', compact('factura'), compact('estados'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditFacturacionRequest $request, $id)
    {
        $input = $request->all();
        $factura = Facturacion::find($id);
        
        $factura->estado = $input['estado'];        
        $factura->save();        
        
        return redirect('venta-producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $factura = Facturacion::find($id);
        
        foreach ($factura->productoxfacturacion as $productoxfacturacion) {
            $productoxfacturacion->delete();
        }       
        $factura->delete();
        return redirect('venta-producto/index');
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $factura = Facturacion::find($id);
        return view('admin-general.venta-producto.detailVentaProducto', compact('factura'));
    }

}
