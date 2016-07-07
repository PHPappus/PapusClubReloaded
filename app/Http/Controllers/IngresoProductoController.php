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
        try{            
            $ingresoproductos = IngresoProducto::where('tipo_solicitud','=','Productos')->get();        
            return view('admin-registros.ingreso-producto.index', compact('ingresoproductos'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }   

    public function create()
    {    
        try{                
            $estados = Configuracion::where('grupo','=','13')
                                        ->where('valor','=','Solicitud Pendiente')->get();                                        
            
            $tipo_solicitudes = Configuracion::where('grupo','=','14')->get();
            
            $proveedores = Proveedor::where('tipo_proveedor','=','Productos')->get();

            return view('admin-registros.ingreso-producto.newIngresoProducto', compact('estados','proveedores','tipo_solicitudes'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
    public function store(StoreIngresoProductoRequest $request)
    {    
        try{   
            $input = $request->all();
            
            $user_id = Auth::user()->id;
            $usuario = User::find($user_id);
            $persona_id = $usuario->persona->id;

            $ingresoproducto = new IngresoProducto();
            $ingresoproducto->persona_id = $persona_id;
            $ingresoproducto->proveedor_id = $input['proveedor_id'];
            $ingresoproducto->tipo_solicitud = $input['tipo_solicitud'];
            $ingresoproducto->descripcion = $input['descripcion'];
            $ingresoproducto->estado = $input['estado'];        
            
            $ingresoproducto->save();       

            return view('admin-registros.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }      

    public function createIngresoProducto($id)
    {       
        try{
            $ingresoproducto = IngresoProducto::find($id);

            
            $productos = Producto::where('estado','=',1)
                                    ->where('tipo_producto','<>','Servicio')
                                    ->where('proveedor_id','=',$ingresoproducto->proveedor_id)
                                    ->get();
            return view('admin-registros.ingreso-producto.add', compact('ingresoproducto','productos'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
        
    }      

    public function storeIngresoProducto(StoreProductoxIngresoProductoRequest $request)
    {   
        try{
            $cantidad = 0;
            
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

            return view('admin-registros.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }      

    //Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        try{
            $ingresoproducto = IngresoProducto::find($id);
            $estados = Configuracion::where('grupo','=','13')
                                    ->where('valor','<>','Servicio Realizado')->get();
            return view('admin-registros.ingreso-producto.editIngresoProducto', compact('ingresoproducto','estados'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

     public function editProducto($id)
    {        
        try{
            $producto = ProductoxIngresoProducto::find($id);
            return view('admin-registros.ingreso-producto.editIngresoProductoDetail', compact('producto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditIngresoProductoRequest $request, $id)
    {
        try{
            $input = $request->all();
            $ingresoproducto = IngresoProducto::find($id);
            
            if ((strcmp($input['estado'], 'Producto Recibido') == 0)  &&  (strcmp($ingresoproducto->estado, 'Solicitud Pendiente') == 0)){
                foreach ($ingresoproducto->productoxingresoProducto as $producto) {
                    $producto->producto->stock = $producto->producto->stock + $producto->cantidad;
                    $producto->producto->save();
                }
                $producto->save();
            }

            $ingresoproducto->estado = $input['estado'];        
            $ingresoproducto->save();        
            
            return redirect('ingreso-producto/index')->with('stored', 'Se actualizó el producto correctamente.');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }

    }

    public function updateProducto(StoreProductoxIngresoProductoRequest $request, $id)
    {
        try{
            $input = $request->all();            

            $productoxingresoproducto = ProductoxIngresoProducto::find($id);                     
            
            $productoxingresoproducto->cantidad = $input['cantidad'];  
            
            $productoxingresoproducto->save();
            
            $productoxingresoproducto->ingresoproducto->save();
            $ingresoproducto = IngresoProducto::find($input['ingresoproducto_id']);

            return view('admin-registros.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
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
            $ingresoproducto = IngresoProducto::find($id);
            
            foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
                $productoxingresoproducto->delete();
            }       
            $ingresoproducto->delete();
            return redirect('ingreso-producto/index');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function destroyProducto($id)    
    {
        try{
            $productoxingresoproducto = ProductoxIngresoProducto::find($id);
            
            $ingresoproducto = IngresoProducto::find($productoxingresoproducto->ingresoproducto_id);        
            $ingresoproducto->save();
            $productoxingresoproducto->delete();

            return view('admin-registros.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

     public function cancel($id)    
    {
        try{
            $ingresoproducto = IngresoProducto::find($id);
            
            foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
                IngresoProductoController::destroyProducto($productoxingresoproducto->id);
            }       
            $ingresoproducto->delete();
            return redirect('ingreso-producto/index');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        try{
            $ingresoproducto = IngresoProducto::find($id);
            return view('admin-registros.ingreso-producto.detailIngresoProducto', compact('ingresoproducto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function back($id)
    {
        try{
            $ingresoproducto = IngresoProducto::find($id);
            return view('admin-registros.ingreso-producto.addIngresoProducto', compact('ingresoproducto'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

}
