<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Http\Requests\StoreProductoRequest;
use papusclub\Http\Requests\EditProductoRequest;


class ProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
		$productos = Producto::all();
        return view('admin-general.producto.index', compact('productos'));
	}	

	public function create()
    {
    	return view('admin-general.producto.newProducto');
    }
    
    public function store(StoreProductoRequest $request)
    {    	
    	$input = $request->all();
        $producto = new Producto();
    	$producto->nombre = $input['nombre'];
		$producto->descripcion = $input['descripcion'];
		$producto->estado = 1;
		$producto->id_tipo_producto = $input['id_tipo_producto'];		
    	
        $producto->save();	    
        
        return redirect('producto/index')->with('stored', 'Se registró el producto correctamente.');
    }
	
	//Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('admin-general.producto.editProducto', compact('producto'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(StoreProductoRequest $request, $id)
    {
        $input = $request->all();
        $producto = Producto::find($id);

        $producto->nombre = $input['nombre'];
        $producto->descripcion = $input['descripcion'];
        $producto->estado = $input['estado'];
        $producto->id_tipo_producto = $input['id_tipo_producto'];       
        
        $producto->save();
        
        return redirect('producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $producto = Producto::find($id);
        $producto->estado = false;
        $producto->save();
        return back();
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('admin-general.producto.detailProducto', compact('producto'));
    }

}
