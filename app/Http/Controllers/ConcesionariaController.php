<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use papusclub\Models\Concesionaria;
use papusclub\Models\Sede;
use papusclub\Http\Requests\StoreConcesionariaRequest;
//use papusclub\Http\Requests\EditConcesionariaRequest;
use Carbon\Carbon;

class ConcesionariaController extends Controller
{
    //Muestra la lista de concesionarias que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva
    public function index() {
		$concesionarias = Concesionaria::all();		
        return view('admin-registros.concesionaria.index', compact('concesionarias'));
	}	

	public function create()
    {
    	$sedes = Sede::all();
    	return view('admin-registros.concesionaria.newConcesionaria', compact('sedes'));
    }
    
    public function store(StoreConcesionariaRequest $request)
    {    	
    	$input = $request->all();
        $carbon=new Carbon();

        $concesionaria = new Concesionaria();
    	$concesionaria->sede_id = $input['sede_id'];
    	$concesionaria->nombre = $input['nombre'];
		$concesionaria->ruc = $input['ruc'];
		$concesionaria->direccion = $input['direccion'];
		$concesionaria->telefono = $input['telefono'];
		$concesionaria->correo = $input['correo'];
		$concesionaria->nombre_responsable = $input['nombre_responsable'];
		$concesionaria->estado = 1;
		
		$date_inicio = str_replace('/', '-', $input['fecha_inicio_concesion']);
		$concesionaria->fecha_inicio_concesion = $carbon->createFromFormat('d-m-Y', $date_inicio)->toDateString();
		$date_fin = str_replace('/', '-', $input['fecha_fin_concesion']);
		$concesionaria->fecha_fin_concesion = $carbon->createFromFormat('d-m-Y', $date_fin)->toDateString();
    	
        $concesionaria->save();	        
        return redirect('concesionaria/index')->with('stored', 'Se registró el concesionaria correctamente.');
        
    }
	
	//Muestra el formulario para poder modificar un concesionaria
    public function edit($id)
    {
        $concesionaria = Concesionaria::find($id);
        return view('admin-registros.concesionaria.editConcesionaria', compact('concesionaria'));
    }

    //Se guarda la informacion modificada del concesionaria en la BD
    public function update(StoreConcesionariaRequest $request, $id)
    {
        $input = $request->all();
        $concesionaria = Concesionaria::find($id);

        $concesionaria->nombre = $input['nombre'];
        $concesionaria->ruc = $input['ruc'];
        $concesionaria->direccion = $input['direccion'];
        $concesionaria->telefono = $input['telefono'];
        $concesionaria->correo = $input['correo'];
        $concesionaria->nombre_responsable = $input['nombre_responsable'];
        $concesionaria->estado = $input['estado'];                

        $concesionaria->save();
        
        return redirect('concesionaria/index')->with('stored', 'Se actualizó la concesionaria correctamente.');

    }

    //Se cambia el estado de un concesionaria a inactiva
    public function destroy($id)    
    {
        $concesionaria = Concesionaria::find($id);
        //$concesionaria->estado = false;
        $concesionaria->delete();
        return back();
    }

    //Se brinda informacion mas detallada del concesionaria
    public function show($id)
    {
        $concesionaria = Concesionaria::find($id);
        return view('admin-registros.concesionaria.detailConcesionaria', compact('concesionaria'));
    }
}
