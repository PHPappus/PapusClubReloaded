<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Models\Distrito;
use papusclub\Models\Postulante;
use papusclub\Models\TipoFamilia;
use papusclub\Models\Socio;
use papusclub\Models\Carnet;
use papusclub\Models\TipoMembresia;
use papusclub\Models\FamiliarxPostulante;
use papusclub\Perfil;
use papusclub\User;

use papusclub\Http\Requests\StorePostulanteRequest;
use papusclub\Http\Requests\EditPostulanteBasicoRequest;
use papusclub\Http\Requests\EditPostulanteNacimientoRequest;
<<<<<<< HEAD
use papusclub\Http\Requests\EditPostulanteViviendaRequest;
=======
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
use papusclub\Http\Requests\EditPostulanteEstudioRequest;
use papusclub\Http\Requests\EditPostulanteTrabajoRequest;
use papusclub\Http\Requests\EditPostulanteContactoRequest;
use papusclub\Http\Requests\StoreFamiliarRequest;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests;
use papusclub\Models\Configuracion;
use Illuminate\Support\Facades\Redirect;

use Session;
use DB;
use Carbon\Carbon;
use DateTime;
use Mail;

class PostulanteController extends Controller
{
    public function index()
    {
        $personas=Postulante::all();

        $postulantes=array();
        foreach ($personas as $per) {

            if(!$per->es_socio())
            {           
                array_push($postulantes,$per);
            }
        }

        return view('admin-persona.persona.postulante.index',compact('postulantes'));
    }

    public function registrar()
    {
        $departamentos=Departamento::select('id','nombre')->get();
        $estadocivil= Configuracion::where('grupo','=','11')->get();
        return view('admin-persona.persona.postulante.newPostulante',compact('departamentos','estadocivil'));
    }

    public function store(StorePostulanteRequest $request){
        $carbon=new Carbon(); 
        $input = $request->all();
<<<<<<< HEAD
=======
        $persona = new Persona();
        
        //DATOS BASICOS
        $persona->nombre = trim($input['nombre']);
        $persona->ap_paterno = trim($input['ap_paterno']);
        $persona->ap_materno = trim($input['ap_materno']);

        $persona->id_tipo_persona = 2;
        $persona->sexo=$input['sexo'];

>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee

        $nacionalidad=$input['nacionalidad'];


        /*=============*/

        if($nacionalidad=='peruano')
        {
            $doc_identidad = $input['doc_identidad'];
            $personaBuscada = Persona::where(['doc_identidad'=>$doc_identidad])->get()->first();
        }
        else
<<<<<<< HEAD
        {
            $carnet_extranjeria = $input['carnet_extranjeria'];
            $personaBuscada=Persona::where(['carnet_extranjeria'=>$carnet_extranjeria])->get()->first();
=======
            $persona->doc_identidad = $input['doc_identidad'];
        
        //NACIMIENTO

        if (empty($input['fecha_nacimiento'])) {
            $persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
        }

        if($personaBuscada==null)
        {
            $persona = new Persona();
            //DATOS BASICOS
            $persona->nombre = trim($input['nombre']);
            $persona->ap_paterno = trim($input['ap_paterno']);
            $persona->ap_materno = trim($input['ap_materno']);

            
            $persona->id_tipo_persona = 2;
            $persona->sexo=$input['sexo'];

            $persona->nacionalidad = $input['nacionalidad'];

            /*=============*/
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
            
            $persona->correo=$input['correo'];


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
            else{
                $postulante->pais_nacimiento=$input['pais_nacimiento'];
                $postulante->lugar_nacimiento=$input['lugar_nacimiento'];

            }

            /*Datos de provincia*/
                if(isset($input['departamento_vivienda']))
                    $postulante->departamento_vivienda=$input['departamento_vivienda'];
                if(isset($input['provincia_vivienda']))
                    $postulante->provincia_vivienda=$input['provincia_vivienda'];
                if(isset($input['distrito_vivienda']))
                    $postulante->distrito_vivienda=$input['distrito_vivienda']; 
                $postulante->domicilio=$input['domicilio'];
                $postulante->referencia_vivienda=$input['referencia_vivienda'];

            /*=======*/
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
            
            $postulante->telefono_celular=$input['telefono_celular'];
            $postulante->estado_civil=$input['estado_civil'];

            

            $postulante->save();

<<<<<<< HEAD

        }
        
=======
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
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee

        return redirect('postulante/index')->with('stored', 'Se registró el postulante correctamente.');
    }

    public function show($id){

        $postulante=Postulante::find($id);
        $estado_civil=Configuracion::find($postulante->estado_civil);

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
        
        $departamentoVivienda = Departamento::find($postulante['departamento_vivienda']);
        $provinciaVivienda = Provincia::find($postulante['provincia_vivienda']);
        $distritoVivienda = Distrito::find($postulante['distrito_vivienda']);

        $arregloLugarVivienda=array();
        array_push($arregloLugarVivienda,$departamentoVivienda);
        array_push($arregloLugarVivienda,$provinciaVivienda);
        array_push($arregloLugarVivienda,$distritoVivienda);
        
        return view('admin-persona.persona.postulante.detailPostulante',compact('postulante','arregloLugar','estado_civil','arregloLugarVivienda'));

    }

    public function edit($id){
        $departamentos=Departamento::select('id','nombre')->get();
        $postulante = Postulante::find($id);
        $estadocivil= Configuracion::where('grupo','=','11')->get();
        $estado=Configuracion::find($postulante->estado_civil);
/*        var_dump($postulante);
        die();*/
        
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

        $postulante->estado_civil=$input['estado_civil'];
/*                var_dump($postulante);
        die();*/
        $postulante->persona->save();
        $postulante->save();

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

            $postulante->direccion_nacimiento = $input['direccion_nacimiento'];
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

    public function updateVivienda(EditPostulanteViviendaRequest $request, $id){

        $postulante = Postulante::withTrashed()->find($id);
        $input=$request->all();
        if(isset($input['departamento_vivienda']))
            $postulante->departamento_vivienda=$input['departamento_vivienda'];
        if(isset($input['provincia_vivienda']))
            $postulante->provincia_vivienda=$input['provincia_vivienda'];
        if(isset($input['distrito_vivienda']))
            $postulante->distrito_vivienda=$input['distrito_vivienda'];

        $postulante->domicilio=$input['domicilio'];
        $postulante->referencia_vivienda=$input['referencia_vivienda'];

        $postulante->save();
        Session::flash('update','vivienda');
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('cambios-viv','Cambios realizados con éxito');
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
        $postulante->colegio_primario=trim($input['colegio_primario']);
        $postulante->colegio_secundario=trim($input['colegio_secundario']);
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

    public function createFamiliar($id)
    {

        $tipo_relacion= TipoFamilia::all();
        $postulante = Postulante::withTrashed()->find($id);

        return view('admin-persona.persona.postulante.familiar.newFamiliar',compact('postulante','tipo_relacion'));
        
    }

     public function storeFamiliar(StoreFamiliarRequest $request, $id)
    {
        $postulante = Postulante::withTrashed()->find($id);
        $input =$request->all();

        $nacionalidad=$input['nacionalidad'];


        $persona = new Persona();
        $relacion=$input['tipo_relacion'];
        if($nacionalidad=='peruano')
        {
            $doc_identidad = $input['doc_identidad'];
            $persona = Persona::where(['doc_identidad'=>$doc_identidad])->get()->first();
        }
        else
        {
            $carnet_extranjeria = $input['carnet_extranjeria'];
            $persona=Persona::where(['carnet_extranjeria'=>$carnet_extranjeria])->get()->first();
        }

        if($persona==null)
        {
            $persona = new Persona();
            $carbon = new Carbon();


            $persona->nombre = trim($input['nombre']);
            $persona->ap_paterno = trim($input['ap_paterno']);
            $persona->ap_materno = trim($input['ap_materno']);            
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
            {
                $persona->doc_identidad = $input['doc_identidad'];             
            }
            if(empty($input['correo']))
            {
                $persona->correo='No ha registrado Correo';
            }
            else
            {
                $persona->correo=$input['correo'];
            }
            if (empty($input['fecha_nacimiento'])) {
                $persona->fecha_nacimiento ="";            
            }else{
                $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
                $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
            }
            $persona->id_tipo_persona = 3;
            $persona->correo=$input['correo'];


            //$match=['postulante_id'=>$id,'persona_id'=>$persona->id];
            
                $persona->save();    
            
            
/*            var_dump($persona);
            die();*/
        }
        $existerela = DB::table('familiarxpostulante')->where([['postulante_id','=',$id],['persona_id','=',$persona->id]])->get();
            if($existerela==null){
                $postulante->addFamiliar($persona,$relacion);
            }
        return Redirect::action('PostulanteController@edit',$postulante->persona->id)->with('storedFamiliar', 'Se registró el Familiar correctamente.');
    }

    public function deleteFamiliar(Request $request,$id,$id_postulante)
    {
        $match=['postulante_id'=>$id_postulante,'persona_id'=>$id];
        DB::table('familiarxpostulante')->where($match)->delete();

        Session::flash('update','familia');    
        return back();
    }

    public function detailFamiliar($id,$id_postulante)
    {   
        $familiar=Persona::find($id);
        $postulante=Persona::find($id_postulante);
        //$relacion=2;
        $relacion_id=$familiar->familiarxpostulante()->where('id_postulante',$postulante->id)->first()->pivot->tipo_familia_id;
        $relacion=TipoFamilia::find($relacion_id)->nombre;
        //$invitado = Invitados::find($id);
        /*var_dump($relacion);
        die();*/
        /*$socio = Socio::withTrashed()->find($invitado->persona_id);
        $persona = Persona::find($invitado->invitado_id);*/
        return view('admin-persona.persona.postulante.familiar.detailFamiliar',compact('familiar','postulante','relacion'));
    }


    public function detailFamiliarPostulante($id,$id_postulante)
    {   
        $familiar=Persona::find($id);
        $postulante=Persona::find($id_postulante);

        $relacion_id=$familiar->familiarxpostulante()->where('id_postulante',$postulante->id)->first()->pivot->tipo_familia_id;
        $relacion=TipoFamilia::find($relacion_id)->nombre;

        return view('admin-persona.persona.postulante.familiar.detailFamiliarPostulante',compact('familiar','postulante','relacion'));
    }

    public function registaSocio($id){
        $postulante=Postulante::find($id);
        $estado_civil=Configuracion::find($postulante->estado_civil);


        /** Observaciones del postulante*/
        $socios_observaciones = $postulante->observacion;

        $carbon=new Carbon();
        if((strtotime($postulante->persona->fecha_nacimiento) < 0))
            $postulante->persona->fecha_nacimiento=NULL;
        else
            $postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $postulante->persona->fecha_nacimiento)->format('d/m/Y');


        return view('admin-persona.persona.postulante.aceptarSocio',compact('postulante','estado_civil','socios_observaciones'));

    }

    public function aceptarPostulante($id)
    {

        /*Tipo de Membresía siempre iniciará como tipo regular el cual se encuentra registrado en la primera casilla de la tabla membresia*/
        $tipoMembresia = TipoMembresia::first();

        /*Información de Postulante*/
        $postulante = Postulante::find($id);

        /*Registrando Socio*/
        $fecha_ingreso = new DateTime("now");
        $fecha_ingreso=$fecha_ingreso->format('Y-m-d');

        $socio = new Socio();
        $socio->fecha_ingreso=$fecha_ingreso;

        $socio->membresia()->associate($tipoMembresia);
        $socio->postulante_id=$id;
        $socio->save();


        /*Asignar carnet*/
        create_carnet($socio);




        $this->enviarUsuario($socio->postulante->persona->correo, $socio->postulante->persona->nombre, $socio->postulante->persona->ap_paterno, $socio->carnet_actual()->nro_carnet);


        return redirect('Socio/')->with('stored', 'Se registró el Socio correctamente.');
    }

    public function rechazarPostulante($id)
    {
        $persona = Persona::find($id);
        $postulante=Postulante::find($persona->id);


        $postulante->forceDelete();
        $persona ->forceDelete();
        return redirect('postulante/index')->with('stored', 'El postulante ha sido rechazado');
    }

    function enviarUsuario($correo,$nombre,$apellido,$carnet)
    {
        //pbtener perfil socio
        $perfil_socio = Perfil::first();

        //creando usuario
        $user = new User();
        $user->name = $nombre;
        $user->email=$correo;
        $password= "papusclub";
        $user->password = $password;
        $user->perfil_id =$perfil_socio->id;
        $user->save();


        $title = '¡Bienvenido a PapusClub!';
        $content = 'Señor(a): '.$nombre.' '.$apellido.' Su solicitud como postulante acaba de ser aceptada.';
        $nro_carnet = 'Acerquese a recoger su carnet con número: '.$carnet;
        $usuario ='Desde este momento ya puede acceder a nuestra página autentificandose con su correo: '.$correo;
        $password ='Y utilizando la contraseña momentánea: <papuscub> la cual sugerimos cambiar lo antes posible';

        $subject ='Registro de usuario';
        $to =$correo;


        /*Este try catch lo uso por si alguien hace pruebas con correos que no estén registrados en mailgun y por tanto hace que mailgun inautorice el envío del correo cayendose entonces el programa*/
        try{
            Mail::send('emails.send', ['title' => $title, 'content' => $content, 'nro_carnet'=>$nro_carnet, 'usuario'=>$usuario,'password'=>$password], function ($message) use($subject,$to)
            {

                $message->from('registros@papusclub.com', 'Juan Ignacio Ferraro');
                $message->to($to);
                $message->subject($subject);

                //$message->sender($address, $name = null);
                //$message->to($address, $name = null);
                //$message->cc($address, $name = null);
                //$message->bcc($address, $name = null);
                //$message->replyTo($address, $name = null);

                //$message->priority($level);
                //$message->attach($pathToFile, array $options = []);            

            });
        }
        /*Nótese el \ es propio del laravel*/
        catch(\Exception $ex)
        {

        }

    }
}
    