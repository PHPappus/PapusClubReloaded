<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Models\Postulante;
use papusclub\Http\Requests\StorePostulanteRequest;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests;

use Carbon\Carbon;

class PostulanteController extends Controller
{
    public function index()
    {
        $personas=Persona::where('id_tipo_persona','=','1')->get();
        return view('admin-general.persona.postulante.index',compact('personas'));
    }

    public function registrar()
    {
        $departamentos=Departamento::select('id','nombre')->get();
        return view('admin-general.persona.postulante.newPostulante',compact('departamentos'));
    }

    public function store(StorePostulanteRequest $request){
        $input = $request->all();
        $persona = new Persona();
        $carbon=new Carbon(); 

        $persona->nacionalidad = $input['nacionalidad'];

        if (empty($input['carnet_extranjeria'])) {
            $persona->carnet_extranjeria ="";
        }
        else
            $persona->carnet_extranjeria = $input['carnet_extranjeria'];

        
        if (empty($input['doc_identidad'])) {
            $persona->doc_identidad ="";
        }
        else
            $persona->doc_identidad = $input['doc_identidad'];
        
        $persona->nombre = trim($input['nombre']);
        $persona->ap_paterno = trim($input['ap_paterno']);
        $persona->ap_materno = trim($input['ap_materno']);

        if (empty($input['fecha_nacimiento'])) {
            $persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        }


        $persona->id_tipo_persona = 1;
        $persona->sexo=$input['sexo'];
        //$persona->correo=trim($input['correo']);
        $persona->save();
        $idPersona = $persona->id; //obtiene el id de la persona ingresada
        //Aqui hago el registro del trabajador una vez registraa la persona

        $postulante = new Postulante();
        $postulante->id_postulante=$idPersona;
        $postulante->direccion_nacimiento=$input['direccion_nacimiento'];
        $postulante->departamentos=$input['departamento'];
        $postulante->departamentos=$input['provincia'];
        $postulante->departamentos=$input['distrito'];


        $postulante->save();

        return redirect('postulante/index')->with('stored', 'Se registró el postulante correctamente.');
    }

    public function getProvincias(){
        //if($request->ajax()){
            $dep_id=Input::get('dep_id');
            $provincias=Provincia::provincias($dep_id);
            return Response::json($provincias);
        //}
    }

     public function destroy($id){

        $persona = Persona::find($id);
        $postulante=Postulante::find($persona->id);


        $postulante->forceDelete();
        $persona ->forceDelete();
        return back();

    }
}
