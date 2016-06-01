<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Persona;
use papusclub\Http\Requests\StoreTrabajadorRequest;

use papusclub\Models\Configuracion;

class TrabajadorController extends Controller
{

    public function index()
    {
        return view('admin-general.persona.trabajador.index', compact('puestos'));
    }

    public function buscar()
    {
        return view('admin-general.persona.trabajador.buscar-trabajador');
    }

    public function registrar()
    {
        $puestos = Configuracion::all()->where('grupo', 1);
        return view('admin-general.persona.trabajador.newTrabajador',compact('puestos'));
    }


    public function store(StoreTrabajadorRequest $request)
    {       
        $input = $request->all();
        $persona = new Persona();

        //$persona->nacionalidad = $input['nacionalidad'];

        if ($input['carnet_extranjeria']='') {
            $persona->doc_identidad ="";
        }
        else
            $persona->doc_identidad = $input['doc_identidad'];

        
        if ($input['carnet_extranjeria']='') {
            $persona->carnet_extranjeria ="";
        }
        else
            $persona->carnet_extranjeria = $input['carnet_extranjeria'];
        $persona->ap_paterno = $input['ap_paterno'];
        $persona->ap_materno = $input['ap_materno'];
        $persona->fecha_nacimiento = $input['fecha_nacimiento'];
        $persona->id_tipo_persona = 1;
        $persona->sexo=$input['sex'];

        //$persona->id_usuario = $input['id_usuario'];     
        
        $persona->save();      
        
        return redirect('trabajador/search')->with('stored', 'Se registró el producto correctamente.');
    }
}
