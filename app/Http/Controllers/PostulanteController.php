<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Models\Distrito;
use papusclub\Models\Postulante;
use papusclub\Http\Requests\StorePostulanteRequest;
use papusclub\Http\Requests\EditPostulanteBasicoRequest;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests;
use papusclub\Models\Configuracion;
use Illuminate\Support\Facades\Redirect;
use Session;

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

        $postulante=Postulante::find($id);


        $carbon=new Carbon();
        if((strtotime($postulante->persona->fecha_nacimiento) < 0))
            $postulante->persona->fecha_nacimiento=NULL;
        else
            $postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $postulante->persona->fecha_nacimiento)->format('d/m/Y');


        $departamento = Departamento::find($postulante['departamento']);
        $provincia = Provincia::find($postulante['provincia']);
        $distrito = Distrito::find($postulante['distrito']);

        $arregloLugar=array();
        array_push($arregloLugar,$departamento);
        array_push($arregloLugar,$provincia);
        array_push($arregloLugar,$distrito);
        
        return view('admin-general.persona.postulante.detailPostulante',compact('postulante','arregloLugar'));

    }

    public function edit($id){
        $departamentos=Departamento::select('id','nombre')->get();
        $postulante = Postulante::find($id);
        $estadocivil= Configuracion::where('grupo','=','11')->get();
        $estado=Configuracion::find($postulante->estado_civil);
        
        $carbon=new Carbon();
        if((strtotime($postulante->persona['fecha_nacimiento']) < 0))
            $postulante->persona->fecha_nacimiento=NULL;
        else
            $postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $postulante->persona->fecha_nacimiento)->format('d/m/Y');
        return view('admin-general.persona.postulante.editPostulante',compact('postulante', 'departamentos','estado','estadocivil'));

        }


    public function updateBasico(EditPostulanteBasicoRequest $request,$id)
    {
        $carbon = new Carbon();

        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();

        if (empty($input['fecha_nacimiento'])) {
            $postulante->persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $postulante->persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        }        


        $postulante->persona->nombre= trim($input['nombre']);;
        $postulante->persona->ap_paterno=trim($input['apellidoPat']);
        $postulante->persona->ap_materno=trim($input['apellidoMat']);
        $postulante->persona->sexo=$input['sexo'];

        $postulante->persona->nacionalidad = $input['nacionalidad'];

        if (empty($input['carnet_extranjeria'])) {
            $postulante->persona->carnet_extranjeria ="";
        }
        else
            $postulante->persona->carnet_extranjeria = $input['carnet_extranjeria'];

        
        if (empty($input['doc_identidad'])) {
            $postulante->persona->doc_identidad ="";
        }
        else
            $postulante->persona->doc_identidad = $input['doc_identidad'];

        $postulante->persona->save();


        //$socio->postulante->persona->update(['nombre'=>$input['nombre'], 'fecha_nacimiento'=>$fecha_nac]);
        //return view('admin-general.persona.socio.editSocio',compact('socio'));
        Session::flash('update','basico');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-bas','Cambios realizados con éxito');
    }
    
    public function destroy($id){

        $persona = Persona::find($id);
        $postulante=Postulante::find($persona->id);


        $postulante->forceDelete();
        $persona ->forceDelete();
        return back();

    }
}
