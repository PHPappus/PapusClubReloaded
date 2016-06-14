<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Models\Distrito;
use papusclub\Models\Postulante;
use papusclub\Http\Requests\StorePostulanteRequest;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests;

use Carbon\Carbon;

class PostulanteController extends Controller
{
    public function index()
    {
        $personas=Postulante::all();
        $postulantes=array();
        foreach ($personas as $per) {
            if($per->socio==NULL)
                array_push($postulantes,$per);

            # code...
        }
/*        $personas=Persona::where([
        ['id_tipo_persona','=','2'],
        ['id_tipo_persona','<>','3'],
        ])->get();*/
        return view('admin-general.persona.postulante.index',compact('postulantes'));
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


        $persona->id_tipo_persona = 2;
        $persona->sexo=$input['sexo'];
        //$persona->correo=trim($input['correo']);
        $persona->save();
        $idPersona = $persona->id; //obtiene el id de la persona ingresada
        //Aqui hago el registro del trabajador una vez registraa la persona

        $postulante = new Postulante();
        $postulante->id_postulante=$idPersona;
        $postulante->direccion_nacimiento=$input['direccion_nacimiento'];
        if(isset($input['departamento']))
            $postulante->departamento=$input['departamento'];
        if(isset($input['provincia']))
            $postulante->provincia=$input['provincia'];
        if(isset($input['distrito']))
            $postulante->distrito=$input['distrito'];
        $postulante->direccion_nacimiento=$input['direccion_nacimiento'];
        $postulante->colegio_primario=$input['colegio_primario'];
        $postulante->colegio_secundario=$input['colegio_secundario'];
        $postulante->universidad=$input['universidad'];
        $postulante->profesion=$input['profesion'];
        $portulante->centro_trabajo=$input['centro_trabajo'];
        $postulante->centro_trabajo=$input['centro_trabajo'];
        $postulante->cargo_trabajo=['cargo_trabajo'];
        $postulante->direccion_laboral['direccion_laboral'];
        $postulante->estado_civil['estado_civil'];


        $postulante->save();

        return redirect('postulante/index')->with('stored', 'Se registró el postulante correctamente.');
    }

/*    public function getProvincias(){
        //if($request->ajax()){
            $dep_id=Input::get('dep_id');
            $provincias=Provincia::provincias($dep_id);
            return Response::json($provincias);
        //}
    }*/

    public function show($id){

        $persona = Persona::find($id);
        //busco el valor del departamento



 

        $carbon=new Carbon();
        if((strtotime($persona['fecha_nacimiento']) < 0))
            $persona->fecha_nacimiento=NULL;
        else
            $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

        $postulante=Postulante::find($persona->id);
        $departamento = Departamento::find($postulante['departamento']);
        $provincia = Provincia::find($postulante['provincia']);
        $distrito = Distrito::find($postulante['distrito']);

        $arregloLugar=array();
        array_push($arregloLugar,$departamento);
        array_push($arregloLugar,$provincia);
        array_push($arregloLugar,$distrito);
        
        return view('admin-general.persona.postulante.detailPostulante',compact('persona','postulante','arregloLugar'));

    }

    public function edit($id){


    }
    
    public function destroy($id){

        $persona = Persona::find($id);
        $postulante=Postulante::find($persona->id);


        $postulante->forceDelete();
        $persona ->forceDelete();
        return back();

    }
}
