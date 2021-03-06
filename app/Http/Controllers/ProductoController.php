<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\Proveedor;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StoreProductoRequest;
use papusclub\Http\Requests\EditProductoRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
use Log;

class ProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
        try{
    		$productos = Producto::where('tipo_producto','<>','Servicio')
                                    ->where('estado','=','1')->get();
            return view('admin-registros.producto.index', compact('productos'));        
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
	}	

	public function create()
    {
        try{        
            $tipo_productos = Configuracion::where('grupo','=','6')
                                            ->where('valor','<>','Servicio')->get();
            $proveedores = Proveedor::where('tipo_proveedor','=','Productos')->get();                                    
        	return view('admin-registros.producto.newProducto', compact('tipo_productos','proveedores'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
    public function store(StoreProductoRequest $request)
    {    	
        try {
        	$input = $request->all();
            $producto = new Producto();
        	$producto->proveedor_id = $input['proveedor_id'];
            $producto->nombre = $input['nombre'];
    		$producto->descripcion = $input['descripcion'];
    		$producto->estado = 1;
    		$producto->tipo_producto = $input['tipo_producto'];		
            $producto->stock = 0;
        	
            $producto->save();	    
            
            $precio = new PrecioProducto();
            $precio->producto_id = $producto->id;
            $precio->precio = $input['precio'];
            $precio->costo = $input['costo'];
            $precio->estado = 1;
            $precio->save();
            return redirect('producto/index')->with('stored', 'Se registró el producto correctamente.');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
	
	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        try {
            $producto = Producto::find($id);
            
            $precio = PrecioProducto::where('producto_id', '=', $id)
                                    ->where('estado', '=', 1)->first();

            if ($precio==null){
                $precio = new PrecioProducto();
                $precio->producto_id = $producto->id;
                $precio->precio = 0;
                $precio->costo = 0;
                $precio->estado = 1;
                $precio->save();
            }

            $tipo_productos = Configuracion::where('grupo','=','6')
                                            ->where('valor','<>','Servicio')->get();

            return view('admin-registros.producto.editProducto', compact('producto','tipo_productos'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(StoreProductoRequest $request, $id)
    {
        try{
            $input = $request->all();
            $producto = Producto::find($id);

            $producto->nombre = $input['nombre'];
            $producto->descripcion = $input['descripcion'];
            $producto->estado = $input['estado'];
            $producto->tipo_producto = $input['tipo_producto'];           
            $producto->save();

            $precioAnt = PrecioProducto::where('producto_id', '=', $id)
                                        ->where('estado', '=', 1)->first();
            $precioAnt->estado = 0;
            $precioAnt->save();
            $precioAnt->delete();

            $precioNuevo = new PrecioProducto();
            $precioNuevo->producto_id = $producto->id;
            $precioNuevo->precio = $input['precio'];
            $precioNuevo->costo = $input['costo'];
            $precioNuevo->estado = 1;
            $precioNuevo->save();
            
            return redirect('producto/index')->with('stored', 'Se actualizó el producto correctamente.');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        try{
            $producto = Producto::find($id);
            
            $producto->precioproducto->first()->estado = 0;
            $producto->precioproducto->first()->save();
            $producto->precioproducto->first()->delete();
            //$producto->delete();
            $producto->estado = 0;
            $producto->save();
            return back();
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        try {
            $producto = Producto::find($id);        
            return view('admin-registros.producto.detailProducto', compact('producto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function storeTipoProducto(StoreConfiguracionRequest $request)
    {   
        try{    
            $input = $request->all();
            $configuracion = new Configuracion();
            $configuracion->valor = $input['valor'];
            $configuracion->grupo = 6;
            $configuracion->descripcion = 'Tipo de Producto';
                   
            $configuracion->save();      
            
            return redirect('producto/new');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

}
