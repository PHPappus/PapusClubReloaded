<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
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
        $puestos = Configuracion::where('grupo', 1)->get();
        return view('admin-general.persona.trabajador.registrar-trabajador',compact('puestos'));
    }


    public function store(StoreTrabajadoRequest $request)
    {       
        $input = $request->all();
        $persona = new Persona();

        //$persona->nacionalidad = $input['nacionalidad'];
        $persona->doc_identidad = $input['doc_identidad'];
        $persona->carnet_extranjeria = $input['carnet_extranjeria'];
        $persona->ap_paterno = $input['ap_paterno'];
        $persona->ap_materno = $input['ap_materno'];
        $persona->fecha_nacimiento = $input['fecha_nacimiento'];
        $persona->id_tipo_persona = $input['id_tipo_persona'];
        $persona->id_usuario = $input['id_usuario'];     
        
        $persona->save();      
        
        return redirect('trabajador/search')->with('stored', 'Se registró el producto correctamente.');
    }
}
