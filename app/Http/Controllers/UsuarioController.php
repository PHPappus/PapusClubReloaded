<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Requests\UserCreateRequest;
use papusclub\Http\Requests\ChangePasswordRequest;
use papusclub\User;
use papusclub\Perfil;
use papusclub\Models\Persona;
use papusclub\Models\Postulante;
use papusclub\Models\Configuracion;
use Carbon\Carbon;
use Auth;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Hash;
use DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cuenta()
    {
        $perfil = 'socio';
        switch (\Auth::user()->perfil_id) {
                case '1':
                    $perfil='socio';
                    break;
                case '2':
                    $perfil='admin';
                    break;
                case '3':
                    $perfil='admin-pagos';
                    break;
                case '4':
                    $perfil='admin-registros';
                    break;
                case '5':
                    $perfil='gerente';
                    break;
                case '6':
                    $perfil='admin-persona';
                    break;
                case '7':
                    $perfil='admin-reserva';
                    break;
                case '8':
                    $perfil='control-ingresos';
                    break;
        }
        if($perfil!='socio')
        {
            return view('auth.cuenta', compact('perfil'));        

        }
        else
        {
                $user_id = Auth::user()->id;
                $usuario = User::find($user_id);
                $persona_id = $usuario->persona->id;
                $postulante = Postulante::find($persona_id);
                $socio = $postulante->socio;
                $estado_civil=Configuracion::find($socio->postulante->estado_civil);
                $carbon=new Carbon();
                $socio->carnet_actual()->fecha_emision=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_emision)->format('d/m/Y');
                $socio->carnet_actual()->fecha_vencimiento=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_vencimiento)->format('d/m/Y');
                $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d',$socio->postulante->persona->fecha_nacimiento)->format('d/m/Y');                





            return view('auth.cuentasocio',compact('socio','estado_civil'));
        }
    }

    public function index()
    {
        $users     = \papusclub\User::All();
        $perfiles  = \papusclub\Perfil::All();
        return view('usuario.consultar',compact('users'),compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $perfiles=Perfil::all();
        $personas = Persona::where('id_usuario','=',null)->where('id_tipo_persona','=',1)//Trabajador
                         ->orwhere('id_usuario','=',null)->where('id_tipo_persona','=',2)//Postulante
                        ->get();
        return view('usuario.create',compact('perfiles','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();
        if($input['perfil_id']!=-1){
            DB::beginTransaction();
            try{
                $user = new User();
                $user->name = $input['name'];
                $user->email = $input['email'];
                /*$user->password = bcrypt($input['password']);*/
                $user->password = $input['password'];
                $user->perfil_id = $input['perfil_id'];
                $user->save();
                /*dd($input['persona_id']);*/
                $persona=Persona::find($input['persona_id']);
                $persona->id_usuario=$user->id;
                $persona->save();
                Session::flash('message','Nuevo Usuario Asignado Correctamente');
            }
            catch(ValidateException $e){
                DB::rollback();
                var_dump($e->getErrors());
            }
            DB::commit();
            return Redirect::to('/usuario');
        }
        else{
            $perfiles=Perfil::all();
            $personas = Persona::where('id_usuario','=',null)->where('id_tipo_persona','=',1)//Trabajador
                             ->orwhere('id_usuario','=',null)->where('id_tipo_persona','=',2)//Postulante
                             ->get();
            Session::flash('message-error','Seleccione un perfil para el usuario');
            return view('usuario.create',compact('perfiles','personas'));
        }
        
    }
    public function changepassword(){
        $perfil = 'socio';
        switch (\Auth::user()->perfil_id) {
                case '1':
                    $perfil='socio';
                    break;
                case '2':
                    $perfil='admin';
                    break;
                case '3':
                    $perfil='admin-pagos';
                    break;
                case '4':
                    $perfil='admin-registros';
                    break;
                case '5':
                    $perfil='gerente';
                    break;
                case '6':
                    $perfil='admin-persona';
                    break;
                case '7':
                    $perfil='admin-reserva';
                    break;
                case '8':
                    $perfil='control-ingresos';
                    break;
        }

       return view('auth.changepassword', compact('perfil'));
    }

    public function confirmchangepassword(ChangePasswordRequest $request)
    {
  
        /*if(Auth::attempt(['password'=>$request['password_current']]))*/
        if(Hash::check($request['password_current'],Auth::user()->password))
        {
            $user=new User;
            $user->where('email','=',Auth::user()->email)
                 ->update(['password' => bcrypt($request['password'])]);
            $perfil = 'socio';
            switch (\Auth::user()->perfil_id) {
                case '1':
                    $perfil='/socio';
                    break;
                case '2':
                    $perfil='/admin-general';
                    break;
                case '3':
                    $perfil='/admin-pagos';
                    break;
                case '4':
                    $perfil='/admin-registros';
                    break;
                case '5':
                    $perfil='/gerente';
                    break;
                case '6':
                    $perfil='/admin-persona';
                    break;
                case '7':
                    $perfil='/admin-reserva';
                    break;
                case '8':
                    $perfil='/control-ingresos';
                    break;
            }
            Session::flash('message','Su contraseña ha sido cambiada con éxito');
            return Redirect::to($perfil)->with('message','Su contraseña ha sido cambiada con éxito');
        }
        else{
            Session::flash('message-error','Contraseña incorrecta');
            return Redirect::to('/password/change');
        }
        
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
}
