<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use papusclub\Models\Concesionaria;
use papusclub\Models\Sede;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StoreConcesionariaRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
//use papusclub\Http\Requests\EditConcesionariaRequest;
use Carbon\Carbon;

class ConcesionariaController extends Controller
{
    //Muestra la lista de concesionarias que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva
    public function index() {
        try{
    		$concesionarias = Concesionaria::all();		
            return view('admin-registros.concesionaria.index', compact('concesionarias'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
	}	

	public function create()
    {
        try{
        	$sedes = Sede::all();
        	$tipo_concesionarias = Configuracion::where('grupo','=','16')->get();
        	return view('admin-registros.concesionaria.newConcesionaria', compact('sedes','tipo_concesionarias'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
    public function store(StoreConcesionariaRequest $request)
    {    
        try{	
        	$input = $request->all();
            $carbon=new Carbon();

            $concesionaria = new Concesionaria();
        	$concesionaria->sede_id = $input['sede_id'];
        	$concesionaria->nombre = $input['nombre'];
    		$concesionaria->ruc = $input['ruc'];
    		$concesionaria->descripcion = $input['descripcion'];
    		$concesionaria->telefono = $input['telefono'];
    		$concesionaria->correo = $input['correo'];
    		$concesionaria->nombre_responsable = $input['nombre_responsable'];
    		$concesionaria->estado = 1;
    		$concesionaria->tipo_concesionaria = $input['tipo_concesionaria'];
    		
    		$date_inicio = str_replace('/', '-', $input['fecha_inicio_concesion']);
    		$concesionaria->fecha_inicio_concesion = $carbon->createFromFormat('d-m-Y', $date_inicio)->toDateString();
    		$date_fin = str_replace('/', '-', $input['fecha_fin_concesion']);
    		$concesionaria->fecha_fin_concesion = $carbon->createFromFormat('d-m-Y', $date_fin)->toDateString();
        	
            $concesionaria->save();	        

            $concesionarias = Concesionaria::all();	
            $stored = 'Se registró el concesionaria correctamente.';
            
            return view('admin-registros.concesionaria.index', compact('concesionarias','stored'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
	
	//Muestra el formulario para poder modificar un concesionaria
    public function edit($id)
    {
        try{
            $concesionaria = Concesionaria::find($id);
            
            $carbon=new Carbon();
            $concesionaria->fecha_inicio_concesion=$carbon->createFromFormat('Y-m-d', $concesionaria->fecha_inicio_concesion)->format('d/m/Y');
            $concesionaria->fecha_fin_concesion=$carbon->createFromFormat('Y-m-d', $concesionaria->fecha_fin_concesion)->format('d/m/Y');

            return view('admin-registros.concesionaria.editConcesionaria', compact('concesionaria'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se guarda la informacion modificada del concesionaria en la BD
    public function update(StoreConcesionariaRequest $request, $id)
    {
        try{            
            $input = $request->all();
            $concesionaria = Concesionaria::find($id);
            
            $carbon=new Carbon();

            $concesionaria->sede_id = $input['sede_id'];
        	$concesionaria->nombre = $input['nombre'];
    		$concesionaria->ruc = $input['ruc'];
    		$concesionaria->descripcion = $input['descripcion'];
    		$concesionaria->telefono = $input['telefono'];
    		$concesionaria->correo = $input['correo'];
    		$concesionaria->nombre_responsable = $input['nombre_responsable'];
    		$concesionaria->estado = 1;
    		$concesionaria->tipo_concesionaria = $input['tipo_concesionaria'];
    		
    		$date_inicio = str_replace('/', '-', $input['fecha_inicio_concesion']);
    		$concesionaria->fecha_inicio_concesion = $carbon->createFromFormat('d-m-Y', $date_inicio)->toDateString();
    		$date_fin = str_replace('/', '-', $input['fecha_fin_concesion']);
    		$concesionaria->fecha_fin_concesion = $carbon->createFromFormat('d-m-Y', $date_fin)->toDateString();
        	
            $concesionaria->save();	        

            $concesionarias = Concesionaria::all();	
            $stored = 'Se registró el concesionaria correctamente.';
            
            return view('admin-registros.concesionaria.index', compact('concesionarias','stored'));       
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se cambia el estado de un concesionaria a inactiva
    public function destroy($id)    
    {
        try{
            $concesionaria = Concesionaria::find($id);
            //$concesionaria->estado = false;
            $concesionaria->delete();
            return back();
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se brinda informacion mas detallada del concesionaria
    public function show($id)
    {
        try{
            $concesionaria = Concesionaria::find($id);

            $carbon=new Carbon();
            $concesionaria->fecha_inicio_concesion=$carbon->createFromFormat('Y-m-d', $concesionaria->fecha_inicio_concesion)->format('d/m/Y');
            $concesionaria->fecha_fin_concesion=$carbon->createFromFormat('Y-m-d', $concesionaria->fecha_fin_concesion)->format('d/m/Y');
            return view('admin-registros.concesionaria.detailConcesionaria', compact('concesionaria'));
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function storeTipoConcesionaria(StoreConfiguracionRequest $request)
    {    
        try{   
            $input = $request->all();
            $configuracion = new Configuracion();
            $configuracion->valor = $input['valor'];
            $configuracion->grupo = 16;
            $configuracion->descripcion = 'Tipo de Concesionaria';
                   
            $configuracion->save();      
            
            return redirect('concesionaria/new');
        } 
        catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
}
