<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Http\Requests\StoreActividadRequest;
use papusclub\Http\Requests\EditActividadRequest;
use Carbon\Carbon;
class ActividadController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {
        $actividades=Actividad::all();
        return view('admin-general.actividad.index',compact('actividades'));
    }
    public function create()
    {
    	/*PAra crear la ACtividad , primero se debe buscar el Ambiente*/
    	$ambientes = Ambiente::all();
        $tipoPersonas = TipoPersona::all();
        
        $values=Configuracion::where('grupo','=','3')->get();

        return view('admin-general.ambiente.searchAmbiente', compact('ambientes'),compact('values'),compact('tipoPersonas'));
    	
    }
    public function store(StoreActividadRequest $request)
    {
        $input = $request->all();
        $actividad = new Actividad();
        $carbon=new Carbon(); 
        $actividad->nombre= $input['nombre'];
        //para agregar la actividades al ambiente
        if($request['ambienteSelec'] != -1){
            $parent = Ambiente::find($input['ambienteSelec']);
            $actividad->ambiente_id = $parent->id;
        }
        //
        $actividad->capacidad_maxima= $input['capacidad_maxima'];
        $actividad->tipo_actividad= $input['tipo_actividad'];
        $actividad->descripcion= $input['descripcion'];
        $actividad->cant_ambientes=$input['cant_ambientes'];
        
        if (empty($input['a_realizarse_en'])) {
                    $actividad->a_realizarse_en="";
                }else{
                    $a_realizarse_en = str_replace('/', '-', $input['a_realizarse_en']);      
                    $actividad->a_realizarse_en=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->createFromFormat('H:i', $input['hora'])->toDateTimeString();
                }

        $actividad->estado=false; 
        $actividad->save();
        return redirect('actividad/index')->with('stored', 'Se registró la actividad correctamente.');
    }
    //Muestra el formulario para poder modificar una actividad
    public function edit($id)
    {
        $actividad=Actividad::find($id);
        return view('admin-general.actividad.editActividad', compact('actividad'));
    }
    //Se guarda la informacion modificada de la actividad en la BD
    public function update(EditActividadRequest $request, $id)
    {
        $input = $request->all();
        $actividad = Actividad::find($id);

        $actividad->nombre= $input['nombre'];
        $actividad->capacidad_maxima= $input['capacidad_maxima'];
        $actividad->tipo_actividad= $input['tipo_actividad'];
        $actividad->descripcion= $input['descripcion'];
        if (empty($input['a_realizarse_en'])) {
                    $actividad->a_realizarse_en="";
                }else{
                    $a_realizarse_en = str_replace('/', '-', $input['a_realizarse_en']);      
                    $actividad->a_realizarse_en=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->createFromFormat('H:i', $input['hora'])->toDateTimeString();
        }
        $actividad->save();
        return redirect('actividad/index');

    }
     //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        $actividad=Actividad::find($id);
        return view('admin-general.actividad.detailActividad', compact('actividad'));
    }
    public function destroy($id)
    {
        $actividad=Actividad::find($id);
        $actividad->delete();
        return back();
    }
}
