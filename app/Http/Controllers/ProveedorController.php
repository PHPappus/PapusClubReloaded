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
		$proveedores = Proveedor::all();
        return view('admin-general.proveedor.index', compact('proveedores'));
	}	

	public function create()
    {
    	return view('admin-general.proveedor.newProveedor');
    }
    
    public function store(StoreProveedorRequest $request)
    {    	
    	$input = $request->all();
        
        $proveedor = new Proveedor();
    	$proveedor->nombre_proveedor = $input['nombre_proveedor'];
		$proveedor->ruc = $input['ruc'];
		$proveedor->direccion = $input['direccion'];
		$proveedor->telefono = $input['telefono'];
		$proveedor->correo = $input['correo'];
		$proveedor->nombre_responsable = $input['nombre_responsable'];
		$proveedor->estado = 1;
    	
        $proveedor->save();	        
        return redirect('proveedor/index')->with('stored', 'Se registró el proveedor correctamente.');
        
    }
	
	//Muestra el formulario para poder modificar un proveedor
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('admin-general.proveedor.editProveedor', compact('proveedor'));
    }

    //Se guarda la informacion modificada del proveedor en la BD
    public function update(StoreProveedorRequest $request, $id)
    {
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

    //Se cambia el estado de un proveedor a inactiva
    public function destroy($id)    
    {
        $proveedor = Proveedor::find($id);
        //$proveedor->estado = false;
        $proveedor->delete();
        return back();
    }

    //Se brinda informacion mas detallada del proveedor
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('admin-general.proveedor.detailProveedor', compact('proveedor'));
    }

}
