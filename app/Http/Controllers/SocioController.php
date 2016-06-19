<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use Illuminate\Routing\Route;

use Auth;
use Session;
use Redirect;
use papusclub\Http\Controllers\Controller;
use papusclub\User;
use papusclub\Models\Socio;
use papusclub\Models\Traspaso;
use papusclub\Models\Postulante;
use papusclub\Http\Requests\StoreTraspasoRequest;

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
        $usuario = User::findOrFail($user_id);
        $persona_id = $usuario->persona->id;

        $postulante = Postulante::find($persona_id);
        $socio = $postulante->socio;

        $socio->traspaso()->save($traspaso);

        $traspaso->save();

        return redirect('traspasos-p')->with('stored', 'Se registró el traspaso correctamente. Acercarse a la oficina a entregar los documentos del nuevo socio a transferir');

    }

    public function misMultas()
    {
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
        $persona_id = $usuario->persona->id;

        $postulante = Postulante::find($persona_id);
        $socio = $postulante->socio;

        $multas = $socio->multaxpersona;

        return view('socio.multas.mismultasindex',compact('multas'));
    }
}
