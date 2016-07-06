<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Http\Requests;
use Illuminate\Routing\Route;
use Carbon\Carbon;
use Auth;
use Session;
use Redirect;
use papusclub\Http\Controllers\Controller;
use papusclub\User;
use papusclub\Models\Socio;
use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\Models\TipoFamilia;
use papusclub\Models\Traspaso;
use papusclub\Models\Postulante;
use papusclub\Models\Invitados;
use papusclub\Models\Configuracion;
use papusclub\Models\HistoricoInvitacion;
use papusclub\Http\Requests\StoreTraspasoRequest;
use papusclub\Http\Requests\StoreObservacionRequest;
use papusclub\Http\Requests\StoreFamiliarSocioRequest;
use papusclub\Http\Requests\StoreInvitadoRequest;
use papusclub\Http\Requests\StoreInvitacionRequest;

use DB;
use Log;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        try
        {
            return view('socio.inicio-al-socio');          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-index';
            return view('errors.corrigeme', compact('error'));            
        }        

    }
    public function cuenta()
    {
        try
        {
            return view('socio.cuenta-al-socio');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-cuenta';
            return view('errors.corrigeme', compact('error'));            
        }         

    }
    public function ambientes()
    {

        try
        {
            return view('socio.ambientes.index');       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-ambientes';
            return view('errors.corrigeme', compact('error'));            
        }        

    }
    public function anularReservaAmbiente()
    {

        try
        {
            return view('socio.ambientes.anular-reserva-ambiente-al');       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-anularReservaAmbiente';
            return view('errors.corrigeme', compact('error'));            
        }            

    }

    public function anularReservaAmbienteB()
    {

        try
        {
            return view('socio.ambientes.anular-reserva-ambiente-b-al');       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-anularReservaAmbienteB';
            return view('errors.corrigeme', compact('error'));            
        }         

    }
    public function pagos()
    {

        try
        {
            return view('socio.pagos.pagos-socio-al');      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-pagos';
            return view('errors.corrigeme', compact('error'));            
        }          

    }
    public function talleres()
    {
        try
        {
            return view('socio.talleres.index');    
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-talleres';
            return view('errors.corrigeme', compact('error'));            
        }        

    } 
    public function futbol()
    {

        try
        {
            return view('socio.talleres.futbol');   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-futbol';
            return view('errors.corrigeme', compact('error'));            
        }           

    }   
    public function bungalow()
    {

        try
        {
            return view('socio.bungalows.index'); 
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-bungalow';
            return view('errors.corrigeme', compact('error'));            
        }        

    } 
    public function bungalowReserva()
    {

        try
        {
            return view('socio.bungalows.reserva-bungalow');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-bungalowReserva';
            return view('errors.corrigeme', compact('error'));            
        }          

    }   
    public function bungalowReservaB()
    {

        try
        {
            return view('socio.bungalows.reserva-bungalow-b');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-bungalowReservaB';
            return view('errors.corrigeme', compact('error'));            
        }        

    }   
    /*public function registrar(){
        return view('socio.ambientes.registrar-ambiente-al');
    }
    public function modificar(){
        return view('socio.ambientes.modificar-ambiente-al');
    }*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
       return view('socio.cuenta-al-socio');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function searchSocio() // va  a la lista de los socios
    {

        try
        {
            $socios = Socio::all();
            return view('admin-general.persona.socio.buscarSocio',compact('socios'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-searchSocio';
            return view('errors.corrigeme', compact('error'));            
        } 

    }

    public function traspmembresia()
    {

        try
        {
            return view('socio.tramites.traspasarMembresia');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-traspmembresia';
            return view('errors.corrigeme', compact('error'));            
        } 

    }

    public function storeTraspaso(StoreTraspasoRequest $request)
    {


        try
        {
            $input = $request->all();

            $traspaso = new Traspaso();

            $traspaso->nombre = $input['nombre'];
            $traspaso->apellido_paterno = $input['apP'];
            $traspaso->apellido_materno = $input['apM'];
            $traspaso->dni = $input['dni'];
            $traspaso->estado = TRUE;

            $user_id = Auth::user()->id;

            $usuario = User::find($user_id);

            $persona_id = $usuario->persona->id;

            $postulante = Postulante::find($persona_id);
            $socio = $postulante->socio;

            $socio->traspaso()->save($traspaso);
            $traspaso->save();

            return redirect('traspaso/')->with('stored', 'Se registró el traspaso correctamente. Acercarse a la oficina a entregar los documentos del nuevo socio a transferir');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-storeTraspaso';
            return view('errors.corrigeme', compact('error'));            
        }




    }

    public function misMultas()
    {

        try
        {
            $user_id = Auth::user()->id;

            $usuario = User::find($user_id);
            $persona_id = $usuario->persona->id;

            $postulante = Postulante::find($persona_id);
            $socio = $postulante->socio;

            $multas = $socio->multaxpersona;

            return view('socio.multas.mismultasindex',compact('multas'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-misMultas';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function verPostulantes()
    {

        try
        {
            $personas=Postulante::all();
            $postulantes=array();
            foreach ($personas as $per) {
                if($per->socio==NULL)
                    array_push($postulantes,$per);
            }

            return view('socio.postulantes.verPostulantes',compact('postulantes'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-verPostulantes';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function agregarObs($id)
    {


        try
        {
            $postulante=Postulante::find($id);

            return view('socio.postulantes.crearObservacion',compact('postulante')); 
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-agregarObs';
            return view('errors.corrigeme', compact('error'));            
        }        
   
    }

    public function storeObservacion(StoreObservacionRequest $request)
    {

        try
        {
            $input = $request->all();

            $user_id = Auth::user()->id;

            $usuario = User::find($user_id);
            $persona_id = $usuario->persona->id;

            $postulante = Postulante::find($persona_id);
            $socio = $postulante->socio;

            $post_dni = $input['dni'];
            $persona = Persona::where('doc_identidad','=',$post_dni)->orwhere('carnet_extranjeria','=',$post_dni)->first();
            $post = Postulante::find($persona->id);

            $post->observacion()->save($socio,['observacion' => $input['obs']]);

            return redirect('ver-postulantes')->with('stored','Se registró la observación correctamene');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-storeObservacion';
            return view('errors.corrigeme', compact('error'));
        }            


    }

    /*Solicitar ingreso con invitados*/
    public function solicitarIngreso()
    {


        try
        {
            /*Obtenemos al socio*/
            $user_id = Auth::user()->id;

            $usuario = User::find($user_id);
            $persona_id = $usuario->persona->id;

            $postulante = Postulante::find($persona_id);
            $socio = $postulante->socio;

            /*Retornamos sus invitados*/
            $invitados = $socio->postulante->persona->invitados;

            $sedes = Sede::all();

            $entrada = Configuracion::where('grupo','=','12')->first();
            $precio = $entrada->valor;
            $precio = 'S/. '.$precio;

            return view('socio.tramites.ingreso',compact('sedes','precio','invitados','socio'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-solicitarIngreso';
            return view('errors.corrigeme', compact('error'));
        }  


    }


    public function storeInvitacion(StoreInvitacionRequest $request)
    {

        try
        {
            $input = $request->all();

            $sede_id = $input['sede'];
            $fecha_str=str_replace('/', '-', $input['fecha_invitacion']);
            $inv_ids = $input['inv'];


            $fecha_invitacion=date("Y-m-d",strtotime($fecha_str)); 

            foreach ($inv_ids as $invitado_id) {
                $historicoinvitacion = new HistoricoInvitacion();
                $historicoinvitacion->invitado_id=$invitado_id;
                $historicoinvitacion->sede_id=$sede_id;
                $historicoinvitacion->fecha_invitacion=$fecha_invitacion;
                $historicoinvitacion->save();
            }

            return redirect('/solicitud-ingreso-invitados')->with('stored','Solicitud de Ingreso creada con éxito.');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-storeInvitacion';
            return view('errors.corrigeme', compact('error'));
        }         
       
    }







    /***/
    /*FAMILIAR*/

    public function createFamiliar($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);
            $tipo_relacion= TipoFamilia::all();
            return view('socio.familiar.newFamiliar',compact('socio','tipo_relacion'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-createFamiliar';
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
                return redirect('/cuenta'); 
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-storeFamiliar';
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
            $error = 'SocioController-deleteFamiliar';
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

            $relacion=TipoFamilia::find($relacion_id)->nombre;
            return view('socio.familiar.detailFamiliar',compact('familiar','socio','relacion')); 
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-detailfamiliar';
            return view('errors.corrigeme', compact('error'));
        }        
       
    }


 /*INVITADOS*/

    public function createInvitado($id)
    {

        try
        {
            $socio = Socio::withTrashed()->find($id);

            return view('socio.invitado.newInvitado',compact('socio'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-createInvitado';
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
            return view('socio.invitado.detailInvitado',compact('persona','socio'));
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-createInvitado';
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
                return redirect('/cuenta'); 
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioController-storeInvitado';
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
            $error = 'SocioController-deleteInvitado';
            return view('errors.corrigeme', compact('error'));
        }        

    }
}
