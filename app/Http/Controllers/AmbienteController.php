<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Models\TarifaAmbientexTipoPersona;
use papusclub\Http\Requests\StoreAmbienteRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
use papusclub\Http\Requests\EditAmbienteRequest;

class AmbienteController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {   
        try {
            $ambientes = Ambiente::all();
            return view('admin-registros.ambiente.index', compact('ambientes'));
        } catch (\Exception $e) {
            $error = 'index-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }


    public function create()
    {
        try {
        	$sedes = Sede::all();
            $tipoPersonas = TipoPersona::all();
            $values=Configuracion::where('grupo','=','2')->get();

            return view('admin-registros.ambiente.newAmbiente', compact('sedes', 'values', 'tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'create-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
        
    }
    //Se almacena el nuevo ambiente que se ha registrado en la BD
    public function store(StoreAmbienteRequest $request)
    {
        try {    
            $input = $request->all();
            $ambiente = new Ambiente();
            $ambiente->nombre= $input['nombre'];
            //para agregar el ambiente a la sede
            if($request['sedeSelec'] != -1){
                $parent = Sede::find($input['sedeSelec']);
                $ambiente->sede_id = $parent->id;
            }
            
            $ambiente->capacidad_actual= $input['capacidad_actual'];
            $tipoAmbiente = Configuracion::find($input['tipo_ambiente']);
            $ambiente->tipo_ambiente= $tipoAmbiente->valor;
            $ambiente->descripcion= $input['descripcion'];
            $ambiente->estado = "Activo";

            $ambiente->save();


            $tipoPersonas = TipoPersona::all();
            $ambiente_id = Ambiente::all()->last()->id;
            foreach ($tipoPersonas as $tipoPersona) {
                $tarifa = new TarifaAmbientexTipoPersona();
                $tarifa->ambiente_id = $ambiente_id;
                $tarifa->tipo_persona_id = $tipoPersona->id;
                if($tipoPersona->descripcion == "vip" || $tipoPersona->descripcion == "Vip")
                    $tarifa->precio = 0;
                else    
                    $tarifa->precio = $input[$tipoPersona->descripcion];
                $tarifa->save();
            }

            
            return redirect('ambiente/index')->with('stored', 'Se registró el ambiente correctamente.');
        } catch (\Exception $e) {
            $error = 'store-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function storeTipoAmbiente(StoreConfiguracionRequest $request)
    {       
        try {
            $input = $request->all();
            $configuracion = new Configuracion();
            $configuracion->valor = $input['valor'];
            $configuracion->grupo = 2;
            $configuracion->descripcion = 'Tipos de Ambientes';
                   
            $configuracion->save();      
            
            return redirect('ambiente/new');
        } catch (\Exception $e) {
            $error = 'storeTipoAmbiente-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Muestra el formulario para poder modificar un ambiente
    public function edit($id)
    {
        try {  
            $ambiente = Ambiente::find($id);
            $tarifas = $ambiente->tarifas;
            
            return view('admin-registros.ambiente.editAmbiente', compact('ambiente', 'tarifas'));
        } catch (\Exception $e) {
            $error = 'edit-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se guarda la informacion modificada del ambiente en la BD
    public function update(EditAmbienteRequest $request, $id)
    {
        try {
            $input = $request->all();
            $ambiente = Ambiente::find($id);

            $ambiente->nombre= $input['nombre'];
            $ambiente->capacidad_actual= $input['capacidad_actual'];
            $ambiente->tipo_ambiente= $input['tipo_ambiente'];
            $ambiente->descripcion= $input['descripcion'];
            $ambiente->update();

            $tarifasAnt = TarifaAmbientexTipoPersona::where('ambiente_id', '=', $id)->get();
            $cantTarifasAnt = $tarifasAnt->count();

            foreach ($tarifasAnt as $tarifaAnt) {
                $tarifaAnt->delete();
            }


            $tipoPersonas = TipoPersona::all();
            foreach ($tipoPersonas as $tipoPersona) {                
                    $tarifa = new TarifaAmbientexTipoPersona();                
                    $tarifa->ambiente_id = $id;
                    $tarifa->tipo_persona_id = $tipoPersona->id;
                    if($cantTarifasAnt)
                        $tarifa->precio = $input[$tipoPersona->descripcion];
                    $cantTarifasAnt--;
                    $tarifa->save();
            }

            return redirect('ambiente/index');
        } catch (\Exception $e) {
            $error = 'update-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }

    }

    //Se cambia el estado de un ambiente a inactivo
    public function destroy($id)    
    {
        try {    
            $ambiente = Ambiente::find($id);
            $actividades = $ambiente->actividades;

            if($ambiente->actividades->count() || $ambiente->reservas->count()){
                return redirect('ambiente/index')->with('delete', 'No se puede eliminar este ambiente, posee dependencias.');
            }
            else{
                $ambiente->estado = "Desactivado";
                $ambiente->delete();
            }
            
            return back();

        } catch (\Exception $e) {
            $error = 'update-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        try {
            $ambiente = Ambiente::find($id);
            $tarifas = $ambiente->tarifas;
            return view('admin-registros.ambiente.detailAmbiente', compact('ambiente','tarifas'));

        } catch (\Exception $e) {
            $error = 'show-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }



    //Para seleccionar el ambiente 
    public function select($id)
    {
        try {
            $ambiente = Ambiente::find($id);
            $values=Configuracion::where('grupo','=','3')->get();
            $tipoPersonas = TipoPersona::all();
            
            return view('admin-registros.actividad.newActividad', compact('ambiente','values','tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'select-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
     public function search()
    {
        try {
            $ambientes = Ambiente::all();
            $tipoPersonas = TipoPersona::all();
            return view('admin-registros.ambiente.searchAmbiente', compact('ambientes'),compact('tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'search-AmbienteController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
}
