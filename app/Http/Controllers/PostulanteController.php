<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests;

class PostulanteController extends Controller
{
    public function index()
    {
        $personas=Persona::where('id_tipo_persona','=','2')->get();
        return view('admin-general.persona.postulante.index',compact('personas'));
    }

    public function registrar()
    {
        $departamentos=Departamento::select('id','nombre')->get();
        return view('admin-general.persona.postulante.newPostulante',compact('departamentos'));
    }

    public function getProvincias(){
        //if($request->ajax()){
            $dep_id=Input::get('dep_id');
            $provincias=Provincia::provincias($dep_id);
            return Response::json($provincias);
        //}
    }
}
