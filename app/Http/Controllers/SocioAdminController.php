<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use papusclub\Http\Requests;
use papusclub\Models\Persona;
use papusclub\Models\Socio;
use papusclub\Models\Postulante;
use papusclub\Models\Carnet;
use papusclub\User;
use papusclub\Perfil;
use papusclub\Models\Multa;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Http\Requests\EditSocioBasicoRequest;
use papusclub\Http\Requests\EditSocioEstudioRequest;
use papusclub\Http\Requests\EditSocioViviendaRequest;
use papusclub\Http\Requests\EditSocioTrabajoRequest;
use papusclub\Http\Requests\EditSocioContactoRequest;
use papusclub\Http\Requests\StoreMultaxPersonaRequest;
use papusclub\Http\Requests\EditSocioNacimientoRequest;
use papusclub\Http\Requests\StoreInvitadoRequest;
use papusclub\Http\Requests\SaveSocioRequest;
use papusclub\Http\Requests\StoreFamiliarSocioRequest;
use papusclub\Models\Invitados;
use papusclub\Models\TipoMembresia;
use papusclub\Models\TipoFamilia;
use Illuminate\Support\Facades\Redirect;
use papusclub\Models\Departamento;
use papusclub\Models\Provincia;
use papusclub\Models\Distrito;
use papusclub\Models\Traspaso;
use Session;
use DB;

use Mail;
use Log; 

class SocioAdminController extends Controller
{
    public function index()
    {

        try
        {
            $socios = Socio::all();
            
            return view('admin-persona.persona.socio.index',compact('socios'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function indexAll()
    {

        try
        {
            $socios = Socio::withTrashed()->get();
            return view('admin-persona.persona.socio.all',compact('socios'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-indexAll';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function show($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $estado_civil=Configuracion::find($socio->postulante->estado_civil);
            $carbon=new Carbon();
            $socio->carnet_actual()->fecha_emision=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_emision)->format('d/m/Y');
            $socio->carnet_actual()->fecha_vencimiento=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_vencimiento)->format('d/m/Y');
            $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d',$socio->postulante->persona->fecha_nacimiento)->format('d/m/Y');
            return view('admin-persona.persona.socio.showSocio',compact('socio','estado_civil'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-show';
            return view('errors.corrigeme', compact('error'));            
        }       

    }

    public function destroy(Socio $socio)
    {

        try
        {
            if(!($socio->isIndependent()))
            {
                $socio->update(['estado'=>false]);
                return redirect('Socio')->with('eliminated', 'Imposible de eliminar debido a que existe dependencia a este socio, se ha cambiado de estado a inhabilitado');
            }
            else
            {
                $socio->forceDelete();
                return back();
            }         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-destroy';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function activate($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $socio->restore();
            if(strcmp($socio->estado(),$socio->inhabilitado())!=0) // carnet vencido o carnet inhabilitado
            {
                /*Registro de un nuevo carnet*/
                $anio = Configuracion::where('grupo',5)->first();
                $tempcarnet = $socio->carnet_actual();
                $carnet = new Carnet();
                $carnet->nro_carnet = $tempcarnet->nro_carnet;
                /*Fecha de emision*/
                $fecha_emision = new DateTime("now");
                $fecha_vencimiento = $fecha_emision;
                $fecha_emision=$fecha_emision->format('Y-m-d');
                $carnet->fecha_emision = $fecha_emision;
                /*Fecha de vencimiento*/
                $intervalo = new DateInterval('P'.$anio->valor.'Y');
                $fecha_vencimiento->add($intervalo);
                $fecha_vencimiento=$fecha_vencimiento->format('Y-m-d');
                $carnet->fecha_vencimiento = $fecha_vencimiento;

                if($socio->estado()==$socio->vencido())
                {
                    $carnet_temp = $socio->carnet_actual();
                    $carnet_temp->update(['estado'=>false]);
                    $carnet_temp->delete();                
                }
                $socio->addCarnet($carnet);
            }
            $socio->update(['estado'=>true]);
            return back();         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-activate';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function edit($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $membresias = TipoMembresia::all();
            $estadocivil= Configuracion::where('grupo','=','11')->get();
            $carbon=new Carbon();
            $socio->carnet_actual()->fecha_emision=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_emision)->format('d/m/Y');
            $socio->carnet_actual()->fecha_vencimiento=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_vencimiento)->format('d/m/Y');
            $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d',$socio->postulante->persona->fecha_nacimiento)->format('d/m/Y');

            $departamentos=Departamento::select('id','nombre')->get();

            return view('admin-persona.persona.socio.editSocio',compact('socio','membresias', 'departamentos','estadocivil'));        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-edit';
            return view('errors.corrigeme', compact('error'));            
        }        
        
    }

    public function updateBasico(EditSocioBasicoRequest $request,$id)
    {


        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();
            $estado_civil = $input['estado_civil'];
            //$fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);
            //$socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
            $socio->postulante->estado_civil=$estado_civil;
            $socio->postulante->save();

            //$socio->postulante->persona->update(['nombre'=>$input['nombre'], 'fecha_nacimiento'=>$fecha_nac]);
            //return view('admin-general.persona.socio.editSocio',compact('socio'));
            Session::flash('update','basico');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-bas','Cambios realizados con éxito');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateBasico';
            return view('errors.corrigeme', compact('error'));            
        }


    }

    public function updateNacimiento(EditSocioNacimientoRequest $request,$id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();

            /*Fecha de nacimiento*/
            $carbon = new Carbon();
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);
            $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();

            /*Dirección de nacimiento*/
            if($input['nacionalidad']=='peruano')
            {
                $departamento_id=$input['departamento'];
                $provincia_id=$input['provincia'];
                $distrito_id=$input['distrito'];
                $direccion = $input['direccion_nacimiento'];

                if($socio->postulante->departamento!=$departamento_id)
                {
                    $depa = Departamento::find($departamento_id);
                    $socio->postulante->Departamento()->associate($depa);
                }
                if($socio->postulante->provincia!=$provincia_id)
                {
                    $prov = Provincia::find($provincia_id);
                    $socio->postulante->Provincia()->associate($prov);
                }
                if($socio->postulante->distrito!=$distrito_id)
                {
                    $dist = Distrito::find($distrito_id);
                    $socio->postulante->Distrito()->associate($dist);
                }
                $socio->postulante->direccion_nacimiento=$direccion;

            }
            else
            {
                $socio->postulante->pais_nacimiento=$input['pais_nacimiento'];
                $socio->postulante->lugar_nacimiento=$input['lugar_nacimiento'];
            }

            $socio->postulante->save();
            //$socio->postulante->persona->update(['nombre'=>$input['nombre'], 'fecha_nacimiento'=>$fecha_nac]);
            //return view('admin-general.persona.socio.editSocio',compact('socio'));
            Session::flash('update','nacimiento');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-nac','Cambios realizados con éxito');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateNacimiento';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function updateVivienda(EditSocioViviendaRequest $request, $id)
    {

        try
        {
            $socio=Socio::withTrashed()->find($id);
            $input=$request->all();

            $dep = $input['departamento_vivienda'];
            $prov = $input['provincia_vivienda'];
            $dist = $input['distrito_vivienda'];
            $domicilio  =$input['domicilio'];
            $referencia_vivienda =$input['referencia_vivienda'];

            $socio->postulante->departamento_vivienda=$dep;
            $socio->postulante->provincia_vivienda=$prov;
            $socio->postulante->distrito_vivienda=$dist;

            $socio->postulante->domicilio = $domicilio;
            $socio->postulante->referencia_vivienda=$referencia_vivienda;

            $socio->postulante->save();
            Session::flash('update','vivienda');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-viv','Cambios realizados con éxito');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateVivienda';
            return view('errors.corrigeme', compact('error'));            
        }        
      
    }

    public function updateEstudio(EditSocioEstudioRequest $request, $id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();
            $primaria = trim($input['colegio_primaria']);
            $secundaria = trim($input['colegio_secundaria']);
            $socio->postulante->colegio_primario=$primaria;
            $socio->postulante->colegio_secundario=$secundaria;
            /*Campos opcionales*/
            if(!empty($input['universidad']))
            {
                $universidad=trim($input['universidad']);
                $socio->postulante->universidad=$universidad;
            }
            if(!empty($input['carrera']))
            {
                $carrera=trim($input['carrera']);
                $socio->postulante->profesion=$carrera;
            }
            $socio->postulante->save();
            Session::flash('update','estudio');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-est','Cambios realizados con éxito');      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateEstudio';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function updateTrabajo(EditSocioTrabajoRequest $request,$id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();
            /*Campos opcionales*/
            if(!empty($input['centrotrabajo']))
            {
                $centrotrabajo=trim($input['centrotrabajo']);
                $socio->postulante->centro_trabajo=$centrotrabajo;
            }
            if(!empty($input['cargocentrotrabajo']))
            {
                $cargocentrotrabajo=trim($input['cargocentrotrabajo']);
                $socio->postulante->cargo_trabajo=$cargocentrotrabajo;
            }
            if(!empty($input['direccionlaboral']))
            {
                $direccionlaboral=trim($input['direccionlaboral']);
                $socio->postulante->direccion_laboral=$direccionlaboral;
            }
            $socio->postulante->save();
            Session::flash('update','trabajo');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-trab','Cambios realizados con éxito');      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateTrabajo';
            return view('errors.corrigeme', compact('error'));            
        }         
                                       
    }

    public function updateContacto(EditSocioContactoRequest $request,$id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();

            $telefono = trim($input['telefono_domicilio']);
            $celular = trim($input['telefono_celular']);

            $socio->postulante->telefono_domicilio=$telefono;
            $socio->postulante->telefono_celular=$celular;
            $socio->postulante->persona->correo=$correo;

            $socio->postulante->persona->save();
            $socio->postulante->save();

            Session::flash('update','contacto');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-cont','Cambios realizados con éxito');      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateContacto';
            return view('errors.corrigeme', compact('error'));            
        }        
      
    }

    public function updateMembresia(Request $request,$id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input=$request->all();

            
            /*Modificar tipo de membresia*/
            $id_membresia = $input['estado'];

            if($id_membresia!=$socio->membresia->id)
            {
                /*Actualizar foreign key*/
                $tipo_membresia= TipoMembresia::withTrashed()->find($id_membresia);
                $socio->membresia()->associate($tipo_membresia);
                $socio->save();
            }
            /*Modificar estado de carnet o socio*/

            if(!empty($input['estadoInv']))
            {
                $estado=$input['estadoInv'];

                if($estado==$socio->vigente())
                {
                    $socio->restore();
                    if($socio->estado==$socio->carnet_inhabilitado())
                    {
                        /*Registro de un nuevo carnet*/
                        $anio = Configuracion::where('grupo',5)->first();
                        $tempcarnet = $socio->carnet_actual();
                        $carnet = new Carnet();
                        $carnet->nro_carnet = $tempcarnet->nro_carnet;
                        /*Fecha de emision*/
                        $fecha_emision = new DateTime("now");
                        $fecha_vencimiento = $fecha_emision;
                        $fecha_emision=$fecha_emision->format('Y-m-d');
                        $carnet->fecha_emision = $fecha_emision;
                        /*Fecha de vencimiento*/
                        $intervalo = new DateInterval('P'.$anio->valor.'Y');
                        $fecha_vencimiento->add($intervalo);
                        $fecha_vencimiento=$fecha_vencimiento->format('Y-m-d');
                        $carnet->fecha_vencimiento = $fecha_vencimiento;
                        if($input['descripcion']!="")
                        {
                            $carnet->descripcion=$input['descripcion'];
                        }
                        $socio->addCarnet($carnet);                   
                    }
                    $socio->update(['estado'=>true]);
                    /*Le cambiamos el perfil a socio (habilitado)*/
                    $id=$socio->postulante->persona->id_usuario;
                    if($id!=null){
                        $usuario=\papusclub\User::find($id);
                        $usuario->update(['perfil_id'=>1]);
                    } 
                }    
            }
            else if(!empty($input['estado-r']))
            {
                        /*Registro de un nuevo carnet*/
                        $anio = Configuracion::where('grupo',5)->first();
                        $tempcarnet = $socio->carnet_actual();
                        $carnet = new Carnet();
                        $carnet->nro_carnet = $tempcarnet->nro_carnet;
                        /*Fecha de emision*/
                        $fecha_emision = new DateTime("now");
                        $fecha_vencimiento = $fecha_emision;
                        $fecha_emision=$fecha_emision->format('Y-m-d');
                        $carnet->fecha_emision = $fecha_emision;
                        /*Fecha de vencimiento*/
                        $intervalo = new DateInterval('P'.$anio->valor.'Y');
                        $fecha_vencimiento->add($intervalo);
                        $fecha_vencimiento=$fecha_vencimiento->format('Y-m-d');
                        $carnet->fecha_vencimiento = $fecha_vencimiento;
                        if(!empty($input['descripcion']))
                        {
                            $carnet->descripcion = $input['descripcion'];
                        }


                        $carnet_temp = $socio->carnet_actual();
                        $carnet_temp->update(['estado'=>false]);
                        $carnet_temp->delete();

                        $socio->addCarnet($carnet);            
            }
            else if(!empty($input['estadoVig']))
            {
                $estado = $input['estadoVig'];
                if($estado!=$socio->estado())
                {
                    if($estado==$socio->inhabilitado())
                    {
                        if(($input['descripcion']!=""))
                        {
                            $descripcion=$input['descripcion'];
                        }
                        else
                        {
                            $descripcion='El socio ha sido inhabilitado pero no se ha especificado el motivo.';
                        }
                        $carnet= $socio->carnet_actual();
                        $carnet->estado=false;
                        $carnet->descripcion=$descripcion;
                        $carnet->save();
                        $carnet->delete();

                        $socio->update(['estado'=>false]);
                        //$socio->delete();
                        /*Le cambiamos el perfil a socio suspendido*/
                        $id=$socio->postulante->persona->id_usuario;
                        if($id!=null){
                            $usuario=\papusclub\User::find($id);
                            $usuario->update(['perfil_id'=>9]);
                        }
                        
                    }
                    else if($estado==$socio->carnet_inhabilitado())
                    {
                        if(!empty($input['descripcion']!=""))
                        {
                            $descripcion=$input['descripcion'];
                        }
                        else
                        {
                            $descripcion='El carnet ha sido inhabilitado pero no se ha especificado el motivo.';
                        }
                        $carnet = $socio->carnet_actual();
                        $carnet->estado=false;
                        $carnet->descripcion=$descripcion;
                        $carnet->save();
                        $carnet->delete();

                        $socio->update(['estado'=>false]);
                        //$socio->delete();
                    }
                }
            }
            Session::flash('update','membresia');
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('cambios-mem','Cambios realizados con éxito');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-updateMembresia';
            return view('errors.corrigeme', compact('error'));            
        }         
         
    }


    /* MULTAS */
    public function indexRegMulta()
    {

        try
        {
            $socios = Socio::all();
            $multas = Multa::all();

            return view('admin-persona.multa.registrarMulta',compact('socios','multas'));      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-indexRegMulta';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function storeMulta(StoreMultaxPersonaRequest $request)
    {

        try
        {
            $input = $request->all();
            $personas = $input['ch'];


            $multa = Multa::find($input['tipoMulta']);

            foreach ($personas as $persona) {
                
                $socio = Socio::find($persona); 
                $fecha = new DateTime('today');
                $fecha=$fecha->format('Y-m-d');
                $socio->multaxpersona()->save($multa,['multa_modificada' => $multa->montoPenalidad, 'descripcion_detallada' => $input['descripcion'],'fecha_registro' => $fecha]);


                

                if ($multa->tipo == "Grave"){

                    $descripcion='El socio ha sido inhabilitado pero no se ha especificado el motivo.';
                
                    $carnet= $socio->carnet_actual();
                    $carnet->estado=false;
                    $carnet->descripcion=$descripcion;
                    $carnet->save();
                    $carnet->delete();

                    $socio->update(['estado'=>false]);
                    
                    $id=$socio->postulante->persona->id_usuario;
                    if($id!=null){
                        $usuario=\papusclub\User::find($id);
                        $usuario->update(['perfil_id'=>9]);
                    }
                }

                $facturacion = new Facturacion();
                $facturacion->persona_id = $socio->postulante->persona->id;
                $facturacion->multa_id = $multa->id;
                $facturacion->tipo_comprobante = "Boleta";
                $nombreMulta = $multa->nombre;
                $facturacion->descripcion = "Penalidad por $nombreMulta";
                $facturacion->total = $multa->montoPenalidad;
                $facturacion->tipo_pago = "No se ha cancelado";
                $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
                $facturacion->estado = $estado->valor;

                $facturacion->save();
            }
            return redirect('multas-s')->with('stored', 'Se registró la multa correctamente.');     
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-storeMulta';
            return view('errors.corrigeme', compact('error'));            
        }        


    }

    /*INVITADOS*/

    public function createInvitado($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $departamentos=Departamento::select('id','nombre')->get();

            return view('admin-persona.persona.socio.invitado.newInvitado',compact('socio','departamentos'));     
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-createInvitado';
            return view('errors.corrigeme', compact('error'));            
        }

    }

    public function detailInvitado($id)
    {

        try
        {
            $invitado = Invitados::find($id);
            $socio = Socio::withTrashed()->find($invitado->persona_id);
            $persona = Persona::find($invitado->invitado_id);
            return view('admin-persona.persona.socio.invitado.detailInvitado',compact('persona','socio'));     
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-detailInvitado';
            return view('errors.corrigeme', compact('error'));            
        }       

    }

    public function detailInvitadoDetalle($id)
    {

        try
        {
            $invitado = Invitados::find($id);
            $socio = Socio::withTrashed()->find($invitado->persona_id);
            $persona = Persona::find($invitado->invitado_id);
            return view('admin-persona.persona.socio.invitado.detailInvitadoDetalle',compact('persona','socio'));     
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-detailInvitadoDetalle';
            return view('errors.corrigeme', compact('error'));            
        }        

    }


    public function storeInvitado(StoreInvitadoRequest $request, $id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $input =$request->all();

            $nacionalidad=$input['nacionalidad'];


            $persona = new Persona();

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
                $persona->save();

                $fecha = new DateTime("now");
                $fecha=$fecha->format('Y-m-d');
                $socio->postulante->persona->addInvitado($persona,$fecha);            
            }
            else
            {
                $fecha = new DateTime("now");
                $fecha=$fecha->format('Y-m-d');
                $socio->postulante->persona->addInvitado($persona,$fecha);          
            }
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('storedInvitado', 'Se registró el Invitado correctamente.');    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-storeInvitado';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function deleteInvitado(Request $request,$id)
    {

        try
        {
            $invitado = Invitados::find($id);
            $invitado->delete();

            Session::flash('update','invitado');    
            return back();    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-deleteInvitado';
            return view('errors.corrigeme', compact('error'));            
        }         

    }


    /*FAMILIAR*/

    public function createFamiliar($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $tipo_relacion= TipoFamilia::all();
            return view('admin-persona.persona.socio.familiar.newFamiliar',compact('socio','tipo_relacion'));   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-createFamiliar';
            return view('errors.corrigeme', compact('error'));            
        }        
               
    }

    public function storeFamiliar(StoreFamiliarSocioRequest $request, $id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
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
                
                $persona->save();    
            }
            $existerela = DB::table('familiarxpostulante')->where([['postulante_id','=',$socio->postulante->id_postulante],['persona_id','=',$persona->id]])->get();
                if($existerela==null){
                    $socio->postulante->addFamiliar($persona,$relacion);
                }
            return Redirect::action('SocioAdminController@edit',$socio->id)->with('storedFamiliar', 'Se registró el Familiar correctamente.');   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-storeFamiliar';
            return view('errors.corrigeme', compact('error'));            
        }        
       
    }

    public function deleteFamiliar(Request $request, $id_fam, $id_post)
    {

        try
        {
            $match=['postulante_id'=>$id_post,'persona_id'=>$id_fam];
            DB::table('familiarxpostulante')->where($match)->delete();

            Session::flash('update','familiar');    
            return back();   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-deleteFamiliar';
            return view('errors.corrigeme', compact('error'));            
        }          

    }

    public function detailfamiliar($id,$id_postulante)
    {

        try
        {
            $familiar=Persona::find($id);
            $postulante=Postulante::find($id_postulante);
            $socio = $postulante->socio;

            $relacion_id = $familiar->familiarxpostulante()->where('id_postulante','=',$id_postulante)->first()->pivot->tipo_familia_id;

            //echo json_encode($relacion_id);
            //die();
            $relacion=TipoFamilia::find($relacion_id)->nombre;
            return view('admin-persona.persona.socio.familiar.detailFamiliar',compact('familiar','socio','relacion'));    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-detailfamiliar';
            return view('errors.corrigeme', compact('error'));            
        }        
       
    }

    public function detailfamiliarDetalle($id,$id_postulante)
    {

        try
        {
            $familiar=Persona::find($id);
            $postulante=Postulante::find($id_postulante);
            $socio = $postulante->socio;

            $relacion_id = $familiar->familiarxpostulante()->where('id_postulante','=',$id_postulante)->first()->pivot->tipo_familia_id;


            //echo json_encode($relacion_id);
            //die();
            $relacion=TipoFamilia::find($relacion_id)->nombre;
            return view('admin-persona.persona.socio.familiar.detailFamiliarDetalle',compact('familiar','socio','relacion'));    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-detailfamiliarDetalle';
            return view('errors.corrigeme', compact('error'));            
        }         
        
    }

    /*TRASPASOS*/

    public function indexTraspasos()
    {

        try
        {
            $traspasos = Traspaso::all();
            return view('admin-persona.tramites.traspasos',compact('traspasos'));
            return back();  
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-cancelarTraspaso';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function validarTraspaso(SaveSocioRequest $request)
    {

        try
        {
            $input = $request->all();

            $monto = Configuracion::where('grupo','=', 18)->first();

            $newmonto = intval($monto->valor);



            $persona=Persona::where('doc_identidad','=',$input['dniP'])->orwhere('carnet_extranjeria','=',$input['dniP'])->first();
            $oldpersona = Persona::where('doc_identidad','=',$input['dni'])->orwhere('carnet_extranjeria','=',$input['dni'])->first();
            $traspaso = Traspaso::where('dni','=',$input['dniP'])->where('estado','=',TRUE)->first();
            if ($persona == NULL){
                $traspaso->update(['estado'=>FALSE]);
                return redirect('traspasos-p')->with('failed','No se encontró al postulante');
            }
         //   if ($postulante->dni == 0)
           //     return redirect('traspasos-p')->with('No se encontró al postulante');

            
            $postulante = Postulante::where('id_postulante','=',$persona->id)->first();
            $oldpostulante = Postulante::where('id_postulante','=',$oldpersona->id)->first();
            $traspaso->socio->update(['estado' => FALSE]);
            $traspaso->update(['estado'=>FALSE]);
            $socio = new Socio();
            $socio->estado = TRUE;
            $fecha = Date('now');
            $socio->fecha_ingreso=$fecha;
            $socio->postulante_id = $postulante->id_postulante;
            $socio->tipo_membresia_id = $oldpostulante->socio->tipo_membresia_id;
            $membresia = TipoMembresia::find($socio->tipo_membresia_id);
            $membresia->socio()->save($socio);

            $socio->save();
            $postulante->socio()->save($socio);
            $carnet = create_carnet($socio);

            $id=$oldpostulante->persona->id_usuario;
            if($id!=null){
                $usuario=\papusclub\User::find($id);
                $usuario->update(['perfil_id'=>9]);
            }


            $this->enviarUsuario($socio->postulante->persona->id,$socio->postulante->persona->correo, $socio->postulante->persona->nombre, $socio->postulante->persona->ap_paterno, $socio->carnet_actual()->nro_carnet);

            $facturacion = new Facturacion();
            $facturacion->persona_id = $persona->id;
            $facturacion->traspaso_id = $traspaso->id;
            $facturacion->tipo_comprobante = "Boleta";
            $facturacion->descripcion = "Traspaso de membresia";
            $facturacion->total = $newmonto;
            $facturacion->tipo_pago = "No se ha cancelado";
            $estado = Configuracion::where('grupo', '=', 7)->where('valor', '=', 'Emitido')->first();
            $facturacion->estado = $estado->valor;

            $facturacion->save();




            return redirect('traspasos-p')->with('stored','Se aprobó el traspaso');  
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-validarTraspaso';
            return view('errors.corrigeme', compact('error'));            
        }         


    }

    public function enviarUsuario($id,$correo,$nombre,$apellido,$carnet)
    {

        try
        {
            //obtener persona
            $persona = Persona::find($id);

            //pbtener perfil socio
            $perfil_socio = Perfil::first();

            //creando usuario
            $user = new User();
            $user->name = $nombre;
            $user->email=$correo;
            $password= "papusclub";
            $user->password = $password;
            $user->perfil_id =$perfil_socio->id;

            try{
                $user->save();
                $persona->id_usuario = $user->id;
                $persona->save();
            }
            catch(\Exception $ex)
            {

            }

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
       

                });
            }
            /*Nótese el \ es propio del laravel*/
            catch(\Exception $ex)
            {

            }      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'PostulanteController-enviarUsuario';
            return view('errors.corrigeme', compact('error'));            
        }          
       

    }

    public function cancelarTraspaso($id)
    {

        try
        {
            $traspaso = Traspaso::find($id);
            $traspaso->update(['estado'=>FALSE]);
            return back();  
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-cancelarTraspaso';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function showTraspaso($id)
    {

        try
        {
            $traspaso = Traspaso::find($id);
            return view('admin-persona.tramites.showTraspaso',compact('traspaso'));    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-showTraspaso';
            return view('errors.corrigeme', compact('error'));            
        }        

    }


    
}
