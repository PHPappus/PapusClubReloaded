<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Proveedor;
use papusclub\Http\Requests\StoreProveedorRequest;
use papusclub\Http\Requests\EditProveedorRequest;


class ProveedorController extends Controller
{
    //Muestra la lista de proveedores que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar un nuevo proveedor
    public function index() {
		try {
            $proveedores = Proveedor::all();
            return view('admin-registros.proveedor.index', compact('proveedores'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
	}	

	public function create()
    {
    	try{
            return view('admin-registros.proveedor.newProveedor');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
    public function store(StoreProveedorRequest $request)
    {    	
        try{
        	$input = $request->all();
            
            $proveedor = new Proveedor();
        	$proveedor->nombre_proveedor = $input['nombre_proveedor'];
    		$proveedor->ruc = $input['ruc'];
    		$proveedor->direccion = $input['direccion'];
    		$proveedor->telefono = $input['telefono'];
    		$proveedor->correo = $input['correo'];
    		$proveedor->nombre_responsable = $input['nombre_responsable'];
    		$proveedor->estado = 1;
            $proveedor->tipo_proveedor = $input['tipo_proveedor'];
        	
            $proveedor->save();	        
            return redirect('proveedor/index')->with('stored', 'Se registró el proveedor correctamente.');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
        
    }
	
	//Muestra el formulario para poder modificar un proveedor
    public function edit($id)
    {
        try{
            $proveedor = Proveedor::find($id);
            return view('admin-registros.proveedor.editProveedor', compact('proveedor'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se guarda la informacion modificada del proveedor en la BD
    public function update(StoreProveedorRequest $request, $id)
    {
        try{
            $input = $request->all();
            $proveedor = Proveedor::find($id);

            $proveedor->nombre_proveedor = $input['nombre_proveedor'];
            $proveedor->ruc = $input['ruc'];
            $proveedor->direccion = $input['direccion'];
            $proveedor->telefono = $input['telefono'];
            $proveedor->correo = $input['correo'];
            $proveedor->nombre_responsable = $input['nombre_responsable'];
            $proveedor->estado = $input['estado'];                

            $proveedor->save();
            
            return redirect('proveedor/index')->with('stored', 'Se actualizó el proveedor correctamente.');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }

    }

    //Se cambia el estado de un proveedor a inactiva
    public function destroy($id)    
    {
        try{            
            $proveedor = Proveedor::find($id);
            //$proveedor->estado = false;
            $proveedor->delete();
            return back();
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se brinda informacion mas detallada del proveedor
    public function show($id)
    {
        try {
            $proveedor = Proveedor::find($id);
            return view('admin-registros.proveedor.detailProveedor', compact('proveedor'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

}