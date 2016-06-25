<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Producto;
use papusclub\Models\PrecioProducto;
use papusclub\Models\Configuracion;
use papusclub\Models\ProductoxIngresoProducto;
use papusclub\Models\IngresoProducto;
use papusclub\Models\Persona;
use papusclub\Models\Proveedor;
use papusclub\Http\Requests\StoreIngresoProductoRequest;
use papusclub\Http\Requests\StoreProductoxIngresoProductoRequest;
use papusclub\Http\Requests\EditIngresoProductoRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
use papusclub\User;
use Auth;
use Session;

class IngresoProductoController extends Controller
{
    //Muestra la lista de productos que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo producto
    public function index() {
        $ingresoproductos = IngresoProducto::all();        
        return view('admin-general.ingreso-producto.index', compact('ingresoproductos'));
    }   

    public function create()
    {                    
        $estados = Configuracion::where('grupo','=','13')
                                    ->where('valor','=','Solicitud Pendiente')->get();                                        
        $proveedores = Proveedor::all();
        return view('admin-general.ingreso-producto.newIngresoProducto', compact('estados','proveedores'));
    }
    
    public function store(StoreIngresoProductoRequest $request)
    {       
        $input = $request->all();
        
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        $ingresoproducto = new IngresoProducto();
        $ingresoproducto->persona_id = $persona_id;
        $ingresoproducto->proveedor_id = $input['proveedor_id'];
        $ingresoproducto->descripcion = $input['descripcion'];
        $ingresoproducto->estado = $input['estado'];        
        
        $ingresoproducto->save();       

        return view('admin-general.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
    }      

    public function createIngresoProducto($id)
    {       
        $ingresoproducto = IngresoProducto::find($id);
        $productos = Producto::all();

        return view('admin-general.ingreso-producto.add', compact('ingresoproducto','productos'));
    }      

    public function storeIngresoProducto(StoreProductoxIngresoProductoRequest $request)
    {   $cantidad = 0;
        
        $input = $request->all();                
        
        $productoxingresoproducto = ProductoxIngresoProducto::where('ingresoproducto_id','=',$input['ingresoproducto_id'])
                                                    ->where('producto_id','=',$input['producto_id'])
                                                    ->first();
        if ($productoxingresoproducto==null){
            $productoxingresoproducto = new ProductoxIngresoProducto();                
        }        
        else{
            $cantidad = $productoxingresoproducto->cantidad;
            $subtotal = $productoxingresoproducto->subtotal;
        }
        
        $productoxingresoproducto->producto_id = $input['producto_id'];
        $productoxingresoproducto->cantidad = $input['cantidad'] + $cantidad;              
        $productoxingresoproducto->ingresoproducto_id = $input['ingresoproducto_id'];

        $productoxingresoproducto->save(); 
        $productoxingresoproducto->ingresoproducto->save();

        $ingresoproducto = IngresoProducto::find($input['ingresoproducto_id']);

        return view('admin-general.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
    }      

    //Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        $estados = Configuracion::where('grupo','=','7')->get();
        return view('admin-general.ingreso-producto.editIngresoProducto', compact('ingresoproducto','estados'));
    }

     public function editProducto($id)
    {        
        $producto = ProductoxIngresoProducto::find($id);
        return view('admin-general.ingreso-producto.editIngresoProductoDetail', compact('producto'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditIngresoProductoRequest $request, $id)
    {
        $input = $request->all();
        $ingresoproducto = IngresoProducto::find($id);
        
        $ingresoproducto->estado = $input['estado'];        
        $ingresoproducto->save();        
        
        return redirect('ingreso-producto/index')->with('stored', 'Se actualizó el producto correctamente.');

    }

    public function updateProducto(StoreProductoxIngresoProductoRequest $request, $id)
    {
        $input = $request->all();            

        $productoxingresoproducto = ProductoxIngresoProducto::find($id);                     
        
        $productoxingresoproducto->cantidad = $input['cantidad'];  
        
        $productoxingresoproducto->save();
        
        $productoxingresoproducto->ingresoproducto->save();
        $ingresoproducto = IngresoProducto::find($input['ingresoproducto_id']);

        return view('admin-general.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));

    }

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $ingresoproducto = IngresoProducto::find($id);
        
        foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
            $productoxingresoproducto->delete();
        }       
        $ingresoproducto->delete();
        return redirect('ingreso-producto/index');
    }

    public function destroyProducto($id)    
    {
        $productoxingresoproducto = ProductoxIngresoProducto::find($id);
        
        $ingresoproducto = IngresoProducto::find($productoxingresoproducto->ingresoproducto_id);        
        $ingresoproducto->save();
        $productoxingresoproducto->delete();

        return view('admin-general.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
    }

     public function cancel($id)    
    {
        $ingresoproducto = IngresoProducto::find($id);
        
        foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
            IngresoProductoController::destroyProducto($productoxingresoproducto->id);
        }       
        $ingresoproducto->delete();
        return redirect('ingreso-producto/index');
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        return view('admin-general.ingreso-producto.detailIngresoProducto', compact('ingresoproducto'));
    }

    public function back($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        return view('admin-general.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
    }

}
