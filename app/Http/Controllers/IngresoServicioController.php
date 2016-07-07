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

class IngresoServicioController extends Controller
{
    public function index() {
        $ingresoproductos = IngresoProducto::where('tipo_solicitud','=','Servicios')->get();        
        return view('admin-registros.ingreso-servicio.index', compact('ingresoproductos'));
    }   

    public function create()
    {                    
        $estados = Configuracion::where('grupo','=','13')
                                    ->where('valor','=','Solicitud Pendiente')->get();                                        
        
        $tipo_solicitudes = Configuracion::where('grupo','=','14')->get();
        
        $proveedores = Proveedor::where('tipo_proveedor','=','Servicios')->get();

        return view('admin-registros.ingreso-servicio.newIngresoServicio', compact('estados','proveedores','tipo_solicitudes'));
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
        $ingresoproducto->tipo_solicitud = $input['tipo_solicitud'];
        $ingresoproducto->descripcion = $input['descripcion'];
        $ingresoproducto->estado = $input['estado'];        
        
        $ingresoproducto->save();       

        return view('admin-registros.ingreso-servicio.addIngresoServicio', compact('ingresoproducto'));
    }      

    public function createIngresoServicio($id)
    {       
        $ingresoproducto = IngresoProducto::find($id);

        
        $productos = Producto::where('estado','=',1)
                                ->where('tipo_producto','=','Servicio')
                                ->where('proveedor_id','=',$ingresoproducto->proveedor_id)
                                ->get();
        return view('admin-registros.ingreso-servicio.add', compact('ingresoproducto','productos'));        
    }      

    public function storeIngresoServicio(StoreProductoxIngresoProductoRequest $request)
    { 
        
        $input = $request->all();                
        
        $productoxingresoproducto = ProductoxIngresoProducto::where('ingresoproducto_id','=',$input['ingresoproducto_id'])
                                                    ->where('producto_id','=',$input['producto_id'])
                                                    ->first();
        if ($productoxingresoproducto==null){
            $productoxingresoproducto = new ProductoxIngresoProducto();                
        }        
        
        $productoxingresoproducto->producto_id = $input['producto_id'];
        $productoxingresoproducto->cantidad = 1;
        $productoxingresoproducto->ingresoproducto_id = $input['ingresoproducto_id'];

        $productoxingresoproducto->save(); 
        $productoxingresoproducto->ingresoproducto->save();

        $ingresoproducto = IngresoProducto::find($input['ingresoproducto_id']);

        return view('admin-registros.ingreso-servicio.addIngresoServicio', compact('ingresoproducto'));
    }      

    //Muestra el formulario para poder modificar un producto
    public function edit($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        $estados = Configuracion::where('grupo','=','13')
                                ->where('valor','<>','Producto Recibido')->get();
        return view('admin-registros.ingreso-servicio.editIngresoServicio', compact('ingresoproducto','estados'));
    }

     public function editServicio($id)
    {        
        $producto = ProductoxIngresoProducto::find($id);
        return view('admin-registros.ingreso-servicio.editIngresoServicioDetail', compact('producto'));
    }

    //Se guarda la informacion modificada del producto en la BD
    public function update(EditIngresoProductoRequest $request, $id)
    {
        $input = $request->all();
        $ingresoproducto = IngresoProducto::find($id);            

        $ingresoproducto->estado = $input['estado'];        
        $ingresoproducto->save();        
        
        return redirect('ingreso-servicio/index')->with('stored', 'Se actualizó el producto correctamente.');

    }   

    //Se cambia el estado de un producto a inactiva
    public function destroy($id)    
    {
        $ingresoproducto = IngresoProducto::find($id);
        
        foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
            $productoxingresoproducto->delete();
        }       
        $ingresoproducto->delete();
        return redirect('ingreso-servicio/index');
    }

    public function destroyServicio($id)    
    {
        $productoxingresoproducto = ProductoxIngresoProducto::find($id);
        
        $ingresoproducto = IngresoProducto::find($productoxingresoproducto->ingresoproducto_id);        
        $ingresoproducto->save();
        $productoxingresoproducto->delete();

        return view('admin-registros.ingreso-servicio.addIngresoServicio', compact('ingresoproducto'));
    }

     public function cancel($id)    
    {
        $ingresoproducto = IngresoProducto::find($id);
        
        foreach ($ingresoproducto->productoxingresoproducto as $productoxingresoproducto) {
            IngresoServicioController::destroyServicio($productoxingresoproducto->id);
        }       
        $ingresoproducto->delete();
        return redirect('ingreso-servicio/index');
    }

    //Se brinda informacion mas detallada del producto
    public function show($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        return view('admin-registros.ingreso-servicio.detailIngresoServicio', compact('ingresoproducto'));
    }

    public function back($id)
    {
        $ingresoproducto = IngresoProducto::find($id);
        return view('admin-registros.ingreso-servicio.addIngresoServicio', compact('ingresoproducto'));
    }
}
