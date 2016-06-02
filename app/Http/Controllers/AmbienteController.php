<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Http\Requests\StoreAmbienteRequest;
use papusclub\Http\Requests\EditAmbienteRequest;

class AmbienteController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {
        $ambientes = Ambiente::all();	
        return view('admin-general.ambiente.index', compact('ambientes'));
    }


    public function create()
    {
    	$sedes = Sede::all();
        return view('admin-general.ambiente.newAmbiente', compact('sedes'));
    }
    //Se almacena el nuevo ambiente que se ha registrado en la BD
    public function store(StoreAmbienteRequest $request)
    {
        $input = $request->all();
        //return compact('input');
        $ambiente = new Ambiente();
        $ambiente->nombre= $input['nombre'];
        //para agregar el ambiente a la sede
        if($request['sedeSelec'] != -1){
            $parent = Sede::find($input['sedeSelec']);
            $ambiente->sede_id = $parent->id;
        }
                

        //
        $ambiente->capacidad_actual= $input['capacidad_actual'];
        $ambiente->tipo_ambiente= $input['tipo_ambiente'];
        $ambiente->ubicacion= $input['ubicacion'];
        $ambiente->save();
        return redirect('ambiente/index')->with('stored', 'Se registró el ambiente correctamente.');
    }
    //Muestra el formulario para poder modificar un ambiente
    public function edit($id)
    {
        $ambiente = Ambiente::find($id);
        return view('admin-general.ambiente.editAmbiente', compact('ambiente'));
    }

    //Se guarda la informacion modificada del ambiente en la BD
    public function update(EditAmbienteRequest $request, $id)
    {
        $input = $request->all();
        //return compact('input');
        $ambiente = Ambiente::find($id);

        $ambiente->nombre= $input['nombre'];
        $ambiente->capacidad_actual= $input['capacidad_actual'];
        $ambiente->tipo_ambiente= $input['tipo_ambiente'];
        $ambiente->ubicacion= $input['ubicacion'];
        $ambiente->save();
        return redirect('ambiente/index');

    }

    //Se cambia el estado de un ambiente a inactivo
    public function destroy($id)    
    {
        $ambiente = Ambiente::find($id);
        $actividades = $ambiente->actividades;

        if($ambiente->actividades->count()){
            /*
            foreach ($actividades as $actividad) {
                $actividad->delete();
            }
            */
        }
        $ambiente->delete();
        return back();
    }

    //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        $ambiente = Ambiente::find($id);
        return view('admin-general.ambiente.detailAmbiente', compact('ambiente'));
    }



    //Para seleccionar el ambiente 
    public function select($id)
    {
        $ambiente = Ambiente::find($id);
        return view('admin-general.actividad.newActividad', compact('ambiente'));
    }
     public function search()
    {
        $ambientes = Ambiente::all();
        return view('admin-general.ambiente.searchAmbiente', compact('ambientes'));
    }
    
}
