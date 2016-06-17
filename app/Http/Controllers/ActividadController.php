<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Models\TarifaActividad;
use papusclub\Models\Reserva;
use papusclub\Http\Requests\StoreActividadRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
use papusclub\Http\Requests\EditActividadRequest;
use Carbon\Carbon;
class ActividadController extends Controller
{
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {
        $actividades=Actividad::all();
        return view('admin-registros.actividad.index',compact('actividades'));
    }
    public function create()
    {
    	/*PAra crear la ACtividad , primero se debe buscar el Ambiente*/
    	$reservas = Reserva::where('actividad_id','!=','null'); 
        $tipoPersonas = TipoPersona::all();
        
        $values=Configuracion::where('grupo','=','3')->get();

        //debe mostrar todas las reservas realizadas
        return view('admin-registros.actividad.listaReservas', compact('reservas', 'values', 'tipoPersonas'));
    	
    }
    public function store(StoreActividadRequest $request)
    {
        $input = $request->all();
        $actividad = new Actividad();
        $carbon=new Carbon(); 
        $actividad->nombre= $input['nombre'];
        //para agregar la actividades al ambiente
        if($request['reservaSelec'] != -1){
            $parent = Reserva::find($input['reservaSelec']);
            $actividad->reserva_id=$parent->id;
            $actividad->ambiente_id = $parent->ambiente->id;
        }
        //
        $actividad->capacidad_maxima= $input['capacidad_maxima'];
        $tipoActividad = Configuracion::find($input['tipo_actividad']);
        $actividad->tipo_actividad= $tipoActividad->valor;
        $actividad->descripcion= $input['descripcion'];
       // $actividad->cant_ambientes=$input['cant_ambientes'];
        
        if (empty($input['a_realizarse_en'])) {
                    $actividad->a_realizarse_en="";
                }else{
                    $a_realizarse_en = str_replace('/', '-', $input['a_realizarse_en']);      
                    $actividad->a_realizarse_en=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
                    $actividad->hora_inicio=$carbon->createFromFormat('H:i', $input['hora'])->toTimeString();
                }
       

        $actividad->estado=false; 
        $actividad->save();

        $tipoPersonas = TipoPersona::all();
        $actividad_id = Actividad::all()->last()->id;
        foreach ($tipoPersonas as $tipoPersona) {
            $tarifa = new TarifaActividad();
            $tarifa->actividad_id = $actividad_id;
            $tarifa->tipo_persona_id = $tipoPersona->id;
            $tarifa->precio = $input[$tipoPersona->descripcion];
            $tarifa->save();
        }

        return redirect('actividad/index')->with('stored', 'Se registró la actividad correctamente.');
    }

    public function storeTipoActividad(StoreConfiguracionRequest $request, $id)
    {       
        $input = $request->all();
        $configuracion = new Configuracion();
        $configuracion->valor = $input['valor'];
        $configuracion->grupo = 3;
        $configuracion->descripcion = 'Tipos de Actividades';
               
        $configuracion->save();      
        
        return redirect('actividad/'.$id.'/select');
    }

    //Muestra el formulario para poder modificar una actividad
    public function edit($id)
    {
        $actividad=Actividad::find($id);
        $tarifas = $actividad->tarifas;
        return view('admin-registros.actividad.editActividad', compact('actividad','tarifas'));
    }
    //Se guarda la informacion modificada de la actividad en la BD
    public function update(EditActividadRequest $request, $id)
    {
        $input = $request->all();
        $actividad = Actividad::find($id);
        $carbon=new Carbon(); 
        $actividad->nombre= $input['nombre'];
        $actividad->capacidad_maxima= $input['capacidad_maxima'];
        $actividad->tipo_actividad= $input['tipo_actividad'];
        $actividad->descripcion= $input['descripcion'];
       
       if (empty($input['a_realizarse_en'])) {
                    $actividad->a_realizarse_en="";
                }else{
                    $a_realizarse_en = str_replace('/', '-', $input['a_realizarse_en']);      
                    $actividad->a_realizarse_en=$carbon->createFromFormat('Y-m-d', $a_realizarse_en)->toDateString();
                    $actividad->hora_inicio=$carbon->createFromFormat('H:i', $input['hora'])->toTimeString();
        }
        
        $actividad->update();

        $tarifasAnt = TarifaActividad::where('actividad_id', '=', $id)->get();

        foreach ($tarifasAnt as $tarifaAnt) {
            $tarifaAnt->delete();
        }


        $tipoPersonas = TipoPersona::all();
        foreach ($tipoPersonas as $tipoPersona) {
            $tarifa = new TarifaActividad();
            $tarifa->actividad_id = $id;
            $tarifa->tipo_persona_id = $tipoPersona->id;
            $tarifa->precio = $input[$tipoPersona->descripcion];
            $tarifa->save();
        }

        return redirect('actividad/index');

    }
     //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        $actividad=Actividad::find($id);
        $tarifas = $actividad->tarifas;
        return view('admin-registros.actividad.detailActividad', compact('actividad','tarifas'));
    }
    public function destroy($id)
    {
        $actividad=Actividad::find($id);
        
        if($actividad->reserva_id==null){
            return redirect('actividad/index')->with('delete', 'No se puede eliminar esta actividad, posee dependencias.');
        }
        else
            $actividad->delete();
        
        return back();

    }
   
     public function select($id)//cuando se selecciona la reserva
    {
        $reserva = Reserva::find($id);
        $values=Configuracion::where('grupo','=','3')->get();
        $tipoPersonas = TipoPersona::all();
        
        return view('admin-registros.actividad.newActividad', compact('reserva','values','tipoPersonas'));
    }
     public function searchReservas()
    {
        $ambientes = Ambiente::all();

        $tipoPersonas = TipoPersona::all();
        return view('admin-registros.actividad.listaReservas', compact('ambientes','tipoPersonas'));
    }
    
}
