<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Sede;
use papusclub\Models\Servicio;
use papusclub\Models\Sedexservicio;
use papusclub\Models\Departamento;
use papusclub\Http\Requests\StoreSedeRequest;
use papusclub\Http\Requests\EditSedeRequest;
use Illuminate\Support\Facades\Input;

class SedesController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {
        $sedes = Sede::all();
        return view('admin-general.sede.index', compact('sedes'));
    }

    //Muestra el formulario para poder registrar una nueva sede en BD
    public function create()
    {
        //$mensaje = null;
        $departamentos=Departamento::lists('nombre','id');
        return view('admin-general.sede.newSede',compact('departamentos'));
    }

    //Se almacena la nueva sede que se ha registrado en la BD
    public function store(StoreSedeRequest $request)
    {
        $input = $request->all();
        $sedes = Sede::all();

        $sede = new Sede();
        $sede->nombre = $input['nombre'];
        $sede->telefono = $input['telefono'];
        $sede->departamento = $input['departamento'];
        $sede->provincia = $input['provincia'];
        $sede->distrito = $input['distrito'];
        $sede->direccion = $input['direccion'];
        $sede->referencia = $input['referencia'];
        $sede->nombre_contacto = $input['nombre_contacto'];
        $sede->capacidad_maxima = $input['capacidad_maxima'];
        $sede->capacidad_socio = $input['capacidad_socio'];

        $sede->save();
        return redirect('sedes/index')->with('stored', 'Se registró la sede correctamente.');
    
    }

    //Muestra el formulario para poder modificar una sede
    public function edit($id)
    {
        $sede = Sede::find($id);
        return view('admin-general.sede.editSede', compact('sede'));
    }

    //Se guarda la informacion modificada de la sede en la BD
    public function update(EditSedeRequest $request, $id)
    {
        $input = $request->all();
        $sede = Sede::find($id);

        $sede->nombre = $input['nombre'];
        $sede->telefono = $input['telefono'];
        $sede->departamento = $input['departamento'];
        $sede->provincia = $input['provincia'];
        $sede->distrito = $input['distrito'];
        $sede->direccion = $input['direccion'];
        $sede->referencia = $input['referencia'];
        $sede->nombre_contacto = $input['nombre_contacto'];
        $sede->capacidad_maxima = $input['capacidad_maxima'];
        $sede->capacidad_socio = $input['capacidad_socio'];
        $sede->save();
        return redirect('sedes/index');

    }

    //Se cambia el estado de una sede a inactiva
    public function destroy($id)    
    {
        $sede = Sede::find($id);        
        $ambientes = $sede->ambientes;
        
        if($sede->ambientes->count() || $sede->actividades->count()) {
            
        }
        else
            $sede->forceDelete();
        
        return back();
    }

    //Se brinda informacion mas detallada de la sede
    public function show($id)
    {
        $sede = Sede::find($id);
        return view('admin-general.sede.detailSede', compact('sede'));
    }

    public function agregarservicios($id)
    {
        
        $sede = Sede::find($id);
        $servicios = Servicio::all();        
        return view('admin-general.sede.serviciosescoger', compact('sede', 'servicios'));
    }

     public function storeservicios($id){
        $servciosEscogidos = Input::get('ch');
        $sede = Sede::find($id);
        $servicios = Servicio::all();  


        foreach ($servciosEscogidos as $serID) {
            foreach ($servicios as $servicio){
                if ( $serID== $servicio->id){                    
                        $s = new Sedexservicio();
                        $s->idsede =  (int) $id;
                        $s->idservicio = (int)$serID;
                        $s->save();
                }   
            }
        }

        return view('admin-general.sede.serviciosdesedeindex', compact('sede', 'servicios','servciosEscogidos'));
     }
}
