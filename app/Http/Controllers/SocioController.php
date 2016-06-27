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
use papusclub\Models\Persona;
use papusclub\Models\TipoFamilia;
use papusclub\Models\Traspaso;
use papusclub\Models\Postulante;
use papusclub\Models\Invitados;
use papusclub\Http\Requests\StoreTraspasoRequest;
use papusclub\Http\Requests\StoreObservacionRequest;
use papusclub\Http\Requests\StoreFamiliarSocioRequest;
use papusclub\Http\Requests\StoreInvitadoRequest;

use DB;

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
        return view('socio.inicio-al-socio');
    }
    public function cuenta()
    {
        return view('socio.cuenta-al-socio');
    }
    public function ambientes()
    {
        return view('socio.ambientes.index');
    }
    public function anularReservaAmbiente(){
        return view('socio.ambientes.anular-reserva-ambiente-al');
    }
    public function anularReservaAmbienteB(){
        return view('socio.ambientes.anular-reserva-ambiente-b-al');
    }
    public function pagos(){
        return view('socio.pagos.pagos-socio-al');
    }
    public function talleres(){
        return view('socio.talleres.index');
    } 
    public function futbol(){
        return view('socio.talleres.futbol');
    }   
    public function bungalow(){
        return view('socio.bungalows.index');
    } 
    public function bungalowReserva(){
        return view('socio.bungalows.reserva-bungalow');
    }   
    public function bungalowReservaB(){
        return view('socio.bungalows.reserva-bungalow-b');
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
        $socios = Socio::all();
        return view('admin-general.persona.socio.buscarSocio',compact('socios'));
    }

    public function traspmembresia()
    {
        return view('socio.tramites.traspasarMembresia');
    }

    public function storeTraspaso(StoreTraspasoRequest $request){

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

    public function misMultas()
    {
        $user_id = Auth::user()->id;

        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        $postulante = Postulante::find($persona_id);
        $socio = $postulante->socio;

        $multas = $socio->multaxpersona;

        return view('socio.multas.mismultasindex',compact('multas'));
    }

    public function verPostulantes()
    {
        $personas=Postulante::all();
        $postulantes=array();
        foreach ($personas as $per) {
            if($per->socio==NULL)
                array_push($postulantes,$per);
        }

        return view('socio.postulantes.verPostulantes',compact('postulantes'));
    }

    public function agregarObs($id)
    {
        $postulante=Postulante::find($id);

        return view('socio.postulantes.crearObservacion',compact('postulante'));    
    }

    public function storeObservacion(StoreObservacionRequest $request)
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







    /***/
    /*FAMILIAR*/

    public function createFamiliar($id)
    {
        $socio = Socio::withTrashed()->find($id);
        $tipo_relacion= TipoFamilia::all();
        return view('socio.familiar.newFamiliar',compact('socio','tipo_relacion'));               
    }

    public function storeFamiliar(StoreFamiliarSocioRequest $request, $id)
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

    public function deleteFamiliar(Request $request, $id_fam, $id_post)
    {
        $match=['postulante_id'=>$id_post,'persona_id'=>$id_fam];
        DB::table('familiarxpostulante')->where($match)->delete();

        Session::flash('update','familiar');    
        return back();
    }

    public function detailfamiliar($id,$id_postulante)
    {
        $familiar=Persona::find($id);
        $postulante=Postulante::find($id_postulante);
        $socio = $postulante->socio;

        $relacion_id = $familiar->familiarxpostulante()->where('id_postulante','=',$id_postulante)->first()->pivot->tipo_familia_id;

        //echo json_encode($relacion_id);
        //die();
        $relacion=TipoFamilia::find($relacion_id)->nombre;
        return view('socio.familiar.detailFamiliar',compact('familiar','socio','relacion'));        
    }


 /*INVITADOS*/

    public function createInvitado($id)
    {

        $socio = Socio::withTrashed()->find($id);

        return view('socio.invitado.newInvitado',compact('socio'));
    }

    public function detailInvitado($id)
    {   
        $invitado = Invitados::find($id);
        $socio = Socio::withTrashed()->find($invitado->persona_id);
        $persona = Persona::find($invitado->invitado_id);
        return view('socio.invitado.detailInvitado',compact('persona','socio'));
    }

    public function storeInvitado(StoreInvitadoRequest $request, $id)
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

    public function deleteInvitado(Request $request,$id)
    {
        $invitado = Invitados::find($id);
        $invitado->delete();

        Session::flash('update','invitado');    
        return back();
    }
}
