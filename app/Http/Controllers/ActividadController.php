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
use papusclub\Models\Sede;
use papusclub\Models\PersonaxActividad;
use papusclub\Http\Requests\StoreActividadRequest;
use papusclub\Http\Requests\StoreEventoRequest;
use papusclub\Http\Requests\StoreConfiguracionRequest;
use papusclub\Http\Requests\EditActividadRequest;
use Carbon\Carbon;
class ActividadController extends Controller
{

     public function select($id)//cuando se selecciona la reserva
    {
        try {
            $reserva = Reserva::find($id);
            $values=Configuracion::where('grupo','=','3')->get();
            $tipoPersonas = TipoPersona::all();
            
            return view('admin-registros.actividad.newActividad', compact('reserva','values','tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'select-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function selectSede($id)//cuando se selecciona la sede(ambiente) del evento
    {
        try {
            $sede = Sede::find($id);
            $ambiente=$sede->ambientes()->where('tipo_ambiente','!=','Bungalow')->first();
            $values=Configuracion::where('grupo','=','3')->where('valor','=','Evento')->get();
            $tipoPersonas = TipoPersona::all();
            
            return view('admin-registros.actividad.newEvento', compact('sede','values','tipoPersonas','ambiente'));
        } catch (\Exception $e) {
            $error = 'selectSede-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    //Muestra la lista de sedes que se encuentran en BD, estas se pueden modificar, cambiar el estado, ver mas detalle o registrar una nueva sede
    public function index()
    {
        try {
            $actividades=Actividad::all();
            return view('admin-registros.actividad.index',compact('actividades'));
        } catch (\Exception $e) {
            $error = 'index-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function create()
    {
        try {    
            /*PAra crear la ACtividad , primero se debe buscar el Ambiente*/
            $reservas = Reserva::where('actividad_id','=',null)->get(); 
            $tipoPersonas = TipoPersona::all();
            $values=Configuracion::where('grupo','=','3')->get();

            //debe mostrar todas las reservas realizadas
            return view('admin-registros.actividad.listaReservas', compact('reservas', 'values', 'tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'create-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
        
    }
    public function createEvento()
    {
        try {
            /*PAra crear la ACtividad , primero se debe buscar el Ambiente*/
            $tipoPersonas = TipoPersona::all();
            $values=Configuracion::where('grupo','=','3')->where('valor','=','Evento')->get();
            $sedes=Sede::all();
            //debe mostrar todas las reservas realizadas
            return view('admin-registros.actividad.listaSedes', compact('sedes', 'values', 'tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'createEvento-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function store(StoreActividadRequest $request)
    {
        try {
            $input = $request->all();
            $actividad = new Actividad();
            $carbon=new Carbon(); 
            $actividad->nombre= $input['nombre'];
            //para agregar la actividades al ambiente
            if($request['reservaSelec'] != -1){
                $parent = Reserva::find($input['reservaSelec']);
                $parent->estadoReserva = "Reservado";
                $parent->update();
                $actividad->reserva_id=$parent->id;
                $actividad->ambiente_id = $parent->ambiente->id;
            }
            //
            $actividad->capacidad_maxima= $input['capacidad_maxima'];
            $actividad->cupos_disponibles= $input['cupos_disponibles'];
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
           

            $actividad->estado=true; 
            $actividad->save();

            $tipoPersonas = TipoPersona::all();
            $actividad_id = $actividad->id;

            foreach ($tipoPersonas as $tipoPersona) {
                $tarifa = new TarifaActividad();
                $tarifa->actividad_id = $actividad_id;
                $tarifa->tipo_persona_id = $tipoPersona->id;
                $tarifa->precio = $input[$tipoPersona->descripcion];
                $tarifa->save();
            }

            return redirect('actividad/index')->with('stored', 'Se registró la actividad correctamente.');
        } catch (\Exception $e) {
            $error = 'store-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function storeEvento(StoreEventoRequest $request)
    {
        try {    
            $input = $request->all();
            $ambiente=Ambiente::find($input['ambiente']);
            $actividad = new Actividad();
            $carbon=new Carbon(); 
            $actividad->nombre= $input['nombre'];
            //para agregar la actividades al ambiente
                $actividad->reserva_id=null;
                $actividad->ambiente_id = $ambiente->id;
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

            if (empty($input['precio_especial_bungalow'])) {
                        $actividad->precio_especial_bungalow=0.0;
            }else{
                $actividad->precio_especial_bungalow=$input['precio_especial_bungalow'];
            }
            $actividad->estado=true; 
            $actividad->save();

            $tipoPersonas = TipoPersona::all();
            $actividad_id = $actividad->id;

            foreach ($tipoPersonas as $tipoPersona) {
                $tarifa = new TarifaActividad();
                $tarifa->actividad_id = $actividad_id;
                $tarifa->tipo_persona_id = $tipoPersona->id;
                $tarifa->precio = $input[$tipoPersona->descripcion];
                $tarifa->save();
            }
            return redirect('actividad/index')->with('stored', 'Se registró la actividad correctamente.');
        } catch (\Exception $e) {
            $error = 'storeEvento-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function storeTipoActividad(StoreConfiguracionRequest $request, $id)
    {       
        try {
            $input = $request->all();
            $configuracion = new Configuracion();
            $configuracion->valor = $input['valor'];
            $configuracion->grupo = 3;
            $configuracion->descripcion = 'Tipos de Actividades';
                   
            $configuracion->save();      
            
            return redirect('actividad/'.$id.'/select');
        } catch (\Exception $e) {
            $error = 'storeTipoActividad-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    //Muestra el formulario para poder modificar una actividad
    public function edit($id)
    {
        try {
            $actividad=Actividad::find($id);
            $tarifas = $actividad->tarifas;
            return view('admin-registros.actividad.editActividad', compact('actividad','tarifas'));
        } catch (\Exception $e) {
            $error = 'edit-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    //Se guarda la informacion modificada de la actividad en la BD
    public function update(EditActividadRequest $request, $id)
    {
        try {
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
                        $actividad->hora_inicio=$carbon->createFromFormat('H:i:s', $input['hora'])->toTimeString();
            }
            
            $actividad->update();

            $tarifasAnt = TarifaActividad::where('actividad_id', '=', $id)->get();
            $cantTarifasAnt = $tarifasAnt->count();

            foreach ($tarifasAnt as $tarifaAnt) {
                $tarifaAnt->delete();
            }


            $tipoPersonas = TipoPersona::all();
            foreach ($tipoPersonas as $tipoPersona) {
                $tarifa = new TarifaActividad();
                $tarifa->actividad_id = $id;
                $tarifa->tipo_persona_id = $tipoPersona->id;
                if($cantTarifasAnt)
                    $tarifa->precio = $input[$tipoPersona->descripcion];
                $cantTarifasAnt--;
                $tarifa->save();
            }

            return redirect('actividad/index');
        } catch (\Exception $e) {
            $error = 'update-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }    

    }
     //Se brinda informacion mas detallada del ambiente
    public function show($id)
    {
        try {   
            $actividad=Actividad::find($id);
            $tarifas = $actividad->tarifas;
            return view('admin-registros.actividad.detailActividad', compact('actividad','tarifas'));
        } catch (\Exception $e) {
            $error = 'show-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    public function destroy($id)
    {
        try {
            $actividad = Actividad::find($id);
            $inscripciones=PersonaxActividad::all();
            foreach ($inscripciones as $inscripcion) {
                if($inscripcion->actividad_id == $id)
                    return redirect('actividad/index')->with('delete', 'No se puede eliminar esta actividad, posee dependencias.');    
            }
            $actividad->delete();
            
            return back();
        } catch (\Exception $e) {
            $error = 'destroy-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }

    }
   
     public function searchReservas()
    {
        try {
            $ambientes = Ambiente::all();

            $tipoPersonas = TipoPersona::all();
            return view('admin-registros.actividad.listaReservas', compact('ambientes','tipoPersonas'));
        } catch (\Exception $e) {
            $error = 'searchReservas-ActividadController';
            return view('errors.corrigeme', compact('error'));
        }
    }
    
}
