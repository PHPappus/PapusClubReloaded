<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\ProductoxFacturacion;
use papusclub\Models\Persona;
use papusclub\Models\Socio;
use papusclub\Http\Requests\StoreFacturacionRequest;
use papusclub\Http\Requests\EditFacturacionRequest;
use papusclub\Http\Requests\StoreProductoxFacturacionRequest;

class VentaProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
		$facturas = Facturacion::where('descripcion','=','Venta de Productos')->get();        
        return view('admin-registros.venta-producto.index', compact('facturas'));
	}	

	public function create()
    {                    
        $estados = Configuracion::where('grupo','=','7')->get();                                
        $tipo_pagos = Configuracion::where('grupo','=','8')->get();
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $personas = Persona::all();
    	return view('admin-registros.venta-producto.newVentaProducto', compact('tipo_pagos','tipo_comprobantes','estados','personas'));
    }
    
    public function store(StoreFacturacionRequest $request)
    {    	
    	$input = $request->all();
      
        $factura = new Facturacion();
    	$factura->persona_id = $input['persona_id'];
		$factura->tipo_pago = $input['tipo_pago'];
        $factura->tipo_comprobante = $input['tipo_comprobante'];
		$factura->estado = $input['estado'];		
    	$factura->descripcion = 'Venta de Productos';

        $numero_comprobante = Facturacion::where('tipo_comprobante','=',$input['tipo_comprobante'])
                                            ->max('numero_comprobante');
        $factura->numero_comprobante = $numero_comprobante + 1;
        $factura->save();	    
        
        return view('admin-registros.venta-producto.addVentaProducto', compact('factura'));
    }	   

    public function createVentaProducto($id)
    {       
        $factura = Facturacion::find($id);
        $productos = Producto::where('tipo_producto','<>','Servicio')->get();

        return view('admin-registros.venta-producto.add', compact('factura','productos'));
    }      

    public function storeVentaProducto(StoreProductoxFacturacionRequest $request)
    {   $cantidad = 0;
        $subtotal = 0;
        $input = $request->all();        
        $producto = Producto::find($input['producto_id']);
        if ($input['cantidad'] > $producto->stock){
            return redirect()->back()->withErrors('No hay stock suficiente');
        }
        else{
            $producto->stock = $producto->stock - $input['cantidad'];
            $producto->save();
        }

        $productoxfacturacion = new ProductoxFacturacion();
        $productoxfacturacion = ProductoxFacturacion::where('facturacion_id','=',$input['facturacion_id'])
                                                    ->where('producto_id','=',$input['producto_id'])
                                                    ->first();
        if ($productoxfacturacion==null){
            $productoxfacturacion = new ProductoxFacturacion();                
        }        
        else{
            $cantidad = $productoxfacturacion->cantidad;
            $subtotal = $productoxfacturacion->subtotal;
        }
        $productoxfacturacion->producto_id = $input['producto_id'];
        $productoxfacturacion->facturacion_id = $input['facturacion_id'];
        $productoxfacturacion->precio = $producto->precioproducto->first()['precio'];
        $productoxfacturacion->cantidad = $input['cantidad'] + $cantidad;  
        $productoxfacturacion->subtotal = $productoxfacturacion->producto->precioproducto->first()['precio'] * $input['cantidad'] + $subtotal;
        $productoxfacturacion->save();

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total + $productoxfacturacion->subtotal - $subtotal;
        $productoxfacturacion->facturacion->save();
        $factura = Facturacion::find($input['facturacion_id']);

        return view('admin-registros.venta-producto.addVentaProducto', compact('factura'));
    }      

	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $factura = Facturacion::find($id);
        if (strcmp($factura->estado, 'Pagado')==0){
            $estados = Configuracion::where('grupo','=','7')
                                    ->where('valor','<>','Emitido')->get();
        }
        else
            $estados = Configuracion::where('grupo','=','7')->get();
        return view('admin-registros.venta-producto.editVentaProducto', compact('factura','estados'));
    }

     public function editProducto($id)
    {        
        $producto = ProductoxFacturacion::find($id);
        return view('admin-registros.venta-producto.editVentaProductoDetail', compact('producto'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditFacturacionRequest $request, $id)
    {
        $input = $request->all();
        $factura = Facturacion::find($id);
        
        if ((strcmp($factura->estado, 'Anulado')!=0 ) && (strcmp($input['estado'], 'Anulado')==0 )) {
            foreach ($factura->productoxfacturacion as $producto) {
                $producto->producto->stock =  $producto->producto->stock + $producto->cantidad;
                $producto->producto->save();
                $producto->save();
            }
        }

        $factura->estado = $input['estado'];        
        $factura->save();        
        
        return redirect('venta-producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    public function updateProducto(StoreProductoxFacturacionRequest $request, $id)
    {
        $input = $request->all();            

        $productoxfacturacion = ProductoxFacturacion::find($id);

        $producto = Producto::find($input['producto_id']);
        if (($input['cantidad']-$productoxfacturacion->cantidad) > $producto->stock){
            return redirect()->back()->withErrors('No hay stock suficiente');
        }
        else{
            $producto->stock = $producto->stock + $productoxfacturacion->cantidad;
            $producto->stock = $producto->stock - $input['cantidad'];  
            $producto->save();
        }

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total - $productoxfacturacion->subtotal;

        $productoxfacturacion->producto_id = $input['producto_id'];
        $productoxfacturacion->facturacion_id = $input['facturacion_id'];
        $productoxfacturacion->cantidad = $input['cantidad'];  
        $productoxfacturacion->subtotal = $productoxfacturacion->producto->precioproducto->first()['precio'] * $input['cantidad'];
        $productoxfacturacion->save();

        $productoxfacturacion->facturacion->total = $productoxfacturacion->facturacion->total + $productoxfacturacion->subtotal;
        $productoxfacturacion->facturacion->save();
        $factura = Facturacion::find($input['facturacion_id']);

        return view('admin-registros.venta-producto.addVentaProducto', compact('factura'));

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

    public function destroyProducto($id)    
    {
        $productoxfacturacion = ProductoxFacturacion::find($id);
        
        $producto = Producto::find($productoxfacturacion->producto_id);
        $producto->stock = $producto->stock + $productoxfacturacion->cantidad;
        $producto->save();

        $factura = Facturacion::find($productoxfacturacion->facturacion_id);
        $factura->total = $factura->total - $productoxfacturacion->subtotal;
        $factura->save();
        $productoxfacturacion->delete();

        return view('admin-registros.venta-producto.addVentaProducto', compact('factura'));
    }

     public function cancel($id)    
    {
        $factura = Facturacion::find($id);
        
        foreach ($factura->productoxfacturacion as $productoxfacturacion) {
            VentaProductoController::destroyProducto($productoxfacturacion->id);
        }       
        $factura->delete();
        return redirect('venta-producto/index');
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $factura = Facturacion::find($id);
        return view('admin-registros.venta-producto.detailVentaProducto', compact('factura'));
    }

    public function back($id)
    {
        $factura = Facturacion::find($id);
        return view('admin-registros.venta-producto.addVentaProducto', compact('factura'));
    }

}
