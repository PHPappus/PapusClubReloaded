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
        $ambientes = Ambiente::all();
        return view('admin-registros.ambiente.index', compact('ambientes'));
    }


    public function create()
    {
    	$sedes = Sede::all();
        $tipoPersonas = TipoPersona::all();
        $values=Configuracion::where('grupo','=','2')->get();

        return view('admin-registros.ambiente.newAmbiente', compact('sedes', 'values', 'tipoPersonas'));
        
    }
    //Se almacena el nuevo ambiente que se ha registrado en la BD
    public function store(StoreAmbienteRequest $request)
    {
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
        $ambiente->ubicacion= $input['ubicacion'];

        $ambiente->save();


        $tipoPersonas = TipoPersona::all();
        $ambiente_id = Ambiente::all()->last()->id;
        foreach ($tipoPersonas as $tipoPersona) {
            $tarifa = new TarifaAmbientexTipoPersona();
            $tarifa->ambiente_id = $ambiente_id;
            $tarifa->tipo_persona_id = $tipoPersona->id;
            $tarifa->precio = $input[$tipoPersona->descripcion];
            $tarifa->save();
        }

        
        return redirect('ambiente/index')->with('stored', 'Se registró el ambiente correctamente.');
    }

    public function storeTipoAmbiente(StoreConfiguracionRequest $request)
    {       
        $input = $request->all();
        $configuracion = new Configuracion();
        $configuracion->valor = $input['valor'];
        $configuracion->grupo = 2;
        $configuracion->descripcion = 'Tipos de Ambientes';
               
        $configuracion->save();      
        
        return redirect('ambiente/new');
    }

    //Muestra el formulario para poder modificar un ambiente
    public function edit($id)
    {
        $ambiente = Ambiente::find($id);
        $tarifas = $ambiente->tarifas;
        
        return view('admin-registros.ambiente.editAmbiente', compact('ambiente', 'tarifas'));
    }

    //Se guarda la informacion modificada del ambiente en la BD
    public function update(EditAmbienteRequest $request, $id)
    {
        $input = $request->all();
        $ambiente = Ambiente::find($id);

        $ambiente->nombre= $input['nombre'];
        $ambiente->capacidad_actual= $input['capacidad_actual'];
        $ambiente->tipo_ambiente= $input['tipo_ambiente'];
        $ambiente->ubicacion= $input['ubicacion'];
        $ambiente->update();

        $tarifasAnt = TarifaAmbientexTipoPersona::where('ambiente_id', '=', $id)->get();

        foreach ($tarifasAnt as $tarifaAnt) {
            $tarifaAnt->delete();
        }


        // $tarifas = $ambiente->tarifas;
        // foreach ($tarifas as $tarifa) {

        // //$tarifa_up = TarifaAmbientexTipoPersona::where('ambiente_id', '=', $tarifa->ambiente_id)->where('tipo_persona_id', '=', $tarifa->tipo_persona_id)->first();
            
        //     //$tarifa_up->precio = $input[$tarifa->tipo_persona->descripcion];
                        
        //     $tarifa->update(['precio'=>$input[$tarifa->tipo_persona->descripcion]]);
        //     // $taller->tarifaTaller()->save($persona,['fecha_registro'=>$fecha,'precio'=>$input[$persona->descripcion],'estado'=>TRUE]);
        // }

        $tipoPersonas = TipoPersona::all();
        foreach ($tipoPersonas as $tipoPersona) {
            $tarifa = new TarifaAmbientexTipoPersona();
            $tarifa->ambiente_id = $id;
            $tarifa->tipo_persona_id = $tipoPersona->id;
            $tarifa->precio = $input[$tipoPersona->descripcion];
            $tarifa->save();
        }

        return redirect('ambiente/index');

    }

    //Se cambia el estado de un ambiente a inactivo
    public function destroy($id)    
    {
        $ambiente = Ambiente::find($id);
        $actividades = $ambiente->actividades;

        if($ambiente->actividades->count()){
            return redirect('ambiente/index')->with('delete', 'No se puede eliminar este ambiente, posee dependencias.');
        }
        else
            $ambiente->delete();
        
        return back();
    }

    //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        $ambiente = Ambiente::find($id);
        $tarifas = $ambiente->tarifas;
        return view('admin-registros.ambiente.detailAmbiente', compact('ambiente','tarifas'));
    }



    //Para seleccionar el ambiente 
    public function select($id)
    {
        $ambiente = Ambiente::find($id);
        $values=Configuracion::where('grupo','=','3')->get();
        $tipoPersonas = TipoPersona::all();
        
        return view('admin-registros.actividad.newActividad', compact('ambiente','values','tipoPersonas'));
    }
     public function search()
    {
        $ambientes = Ambiente::all();
        $tipoPersonas = TipoPersona::all();
        return view('admin-registros.ambiente.searchAmbiente', compact('ambientes'),compact('tipoPersonas'));
    }
    
}
