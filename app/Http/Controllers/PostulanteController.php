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
use papusclub\Http\Requests\EditPostulanteNacimientoRequest;
use papusclub\Http\Requests\EditPostulanteEstudioRequest;
use papusclub\Http\Requests\EditPostulanteTrabajoRequest;
use papusclub\Http\Requests\EditPostulanteContactoRequest;
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
        return view('admin-persona.persona.postulante.index',compact('postulantes'));
    }

    public function registrar()
    {
        $departamentos=Departamento::select('id','nombre')->get();
        return view('admin-persona.persona.postulante.newPostulante',compact('departamentos'));
    }

    public function store(StorePostulanteRequest $request){
        $carbon=new Carbon(); 
        $input = $request->all();
        $persona = new Persona();
        
        //DATOS BASICOS
        $persona->nombre = trim($input['nombre']);
        $persona->ap_paterno = trim($input['ap_paterno']);
        $persona->ap_materno = trim($input['ap_materno']);

        $persona->id_tipo_persona = 2;
        $persona->sexo=$input['sexo'];


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
        
        //NACIMIENTO

        if (empty($input['fecha_nacimiento'])) {
            $persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        }


        $persona->save();
        //$persona->correo=trim($input['correo']);


        $idPersona = $persona->id; //obtiene el id de la persona ingresada
        //Aqui hago el registro del trabajador una vez registraa la persona

        $postulante = new Postulante();
        //si es peruano 
        $postulante->id_postulante=$idPersona;

        if($persona->nacionalidad =="peruano"){
            if(isset($input['departamento']))
                $postulante->departamento=$input['departamento'];
            if(isset($input['provincia']))
                $postulante->provincia=$input['provincia'];
            if(isset($input['distrito']))
                $postulante->distrito=$input['distrito']; 
            $postulante->direccion_nacimiento=$input['direccion_nacimiento'];
        }

        $postulante->colegio_primario=$input['colegio_primario'];
        $postulante->colegio_secundario=$input['colegio_secundario'];
        
        if (empty($input['universidad'])) {
            $postulante->universidad ="";            
        }else{
            $postulante->universidad=$input['universidad'];
        }

        if (empty($input['profesion'])) {
            $postulante->profesion= "";            
        }else{
            $postulante->profesion=$input['profesion'];
        }
        
        $postulante->centro_trabajo=$input['centro_trabajo'];
        
        if (empty($input['cargo_trabajo'])) {
            $postulante->cargo_trabajo="";            
        }else{
            $postulante->cargo_trabajo=$input['cargo_trabajo'];
        }

        $postulante->direccion_laboral=$input['direccion_laboral'];
        
        if (empty($input['telefono_domicilio'])) {
           $postulante->telefono_domicilio="";            
        }else{
           $postulante->telefono_domicilio=$input['telefono_domicilio'];
        }
        
        $postulante->telefono_domicilio=$input['telefono_celular'];
        $postulante->correo=$input['correo'];
        //$postulante->estado_civil['estado_civil'];

        

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
        
        return view('admin-persona.persona.postulante.detailPostulante',compact('postulante','arregloLugar'));

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
        return view('admin-persona.persona.postulante.editPostulante',compact('postulante', 'departamentos','estado','estadocivil'));

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

    public function updateNacimiento(EditPostulanteNacimientoRequest $request, $id){
        $carbon = new Carbon();

        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();

        if (empty($input['fecha_nacimiento'])) {
            $postulante->persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $postulante->persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        }

        $postulante->persona->save();


        /*Dirección de nacimiento*/
        if($input['nacionalidad1']=='peruano')
        {
            if(isset($input['departamento']))
                $postulante->departamento=$input['departamento'];
            if(isset($input['provincia']))
                $postulante->provincia=$input['provincia'];
            if(isset($input['distrito']))
                $postulante->distrito=$input['distrito'];

            $postulante->   direccion_nacimiento = $input['direccion_nacimiento'];
        }
        else
        {
            $postulante->pais_nacimiento=$input['pais_nacimiento'];
            $postulante->lugar_nacimiento=$input['lugar_nacimiento'];
        }
        $postulante->save();
        //$socio->postulante->persona->update(['nombre'=>$input['nombre'], 'fecha_nacimiento'=>$fecha_nac]);
        //return view('admin-general.persona.socio.editSocio',compact('socio'));
        Session::flash('update','nacimiento');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-nac','Cambios realizados con éxito');
    }

    public function updateEstudio(EditPostulanteEstudioRequest $request, $id){

        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();
        $postulante->colegio_primario=trim($input['colegio_primaria']);
        $postulante->colegio_secundario=trim($input['colegio_secundaria']);
        $postulante->universidad=trim($input['universidad']);
        $postulante->profesion=trim($input['carrera']);

        $postulante->save();
        Session::flash('update','estudio');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-est','Cambios realizados con éxito');
    }
    
    public function updateTrabajo(EditPostulanteTrabajoRequest $request, $id){
        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();
        $postulante->centro_trabajo=trim($input['centrotrabajo']);
        $postulante->cargo_trabajo=trim($input['cargocentrotrabajo']);
        $postulante->direccion_laboral=trim($input['direccionlaboral']);

        $postulante->save();
        Session::flash('update','trabajo');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-trab','Cambios realizados con éxito');
    }

    public function updateContacto(EditPostulanteContactoRequest $request, $id){
        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();
        $postulante->telefono_domicilio=trim($input['telefono_domicilio']);
        $postulante->telefono_celular=trim($input['telefono_celular']);
        $postulante->persona->correo=trim($input['correo']);

        $postulante->persona->save();
        $postulante->save();
        Session::flash('update','contacto');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-cont','Cambios realizados con éxito');
    }

    public function destroy($id){

        $persona = Persona::find($id);
        $postulante=Postulante::find($persona->id);


        $postulante->forceDelete();
        $persona ->forceDelete();
        return back();

    }
}
    