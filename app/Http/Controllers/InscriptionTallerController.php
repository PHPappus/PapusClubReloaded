<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;

use papusclub\Http\Requests\MakeInscriptionToUserRequest;

use Session;
use Redirect;

use papusclub\Models\Taller;
use papusclub\Models\Sede;
use papusclub\User;
use Auth;
use Hash;

class InscriptionTallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres       = \papusclub\Models\Taller::All();
        $talleres_user  = Auth::user()->talleres;
        $sedes          = Sede::all();
        return view('socio.talleres.index',compact('sedes','talleres','talleres_user'));
    }

    /**
     * Show the form for creating a new resource.
     * Auth::user()->talleres
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTallerRequest $request)
    {
        $input = $request->all();

        $taller = new Taller();
        $taller->nombre         = $input['nombre'];
        $taller->descripcion    = $input['descripcion'];
        $taller->profesor       = $input['profesor'];
        $taller->fecha_inicio   = $input['fecha_inicio'];
        $taller->fecha_fin      = $input['fecha_fin'];
        $taller->fecha_inicio_inscripciones   = $input['fecha_inicio_inscripciones'];
        $taller->fecha_fin_inscripciones      = $input['fecha_fin_inscripciones'];
        $taller->cantidad_sesiones  = $input['cantidad_sesiones'];
        $taller->vacantes       = $input['vacantes'];
        $taller->precio_base    = $input['precio_base'];
        $taller->estado         = $input['estado'];

        $taller->save();
        return back();
    
    }

    public function makeInscriptionToUser(MakeInscriptionToUserRequest $request, $id)
    {
        /*if(Auth::attempt(['password'=>$request['password']])){*/
        if(Hash::check($request['password'],Auth::user()->password)){
        	$usuario  = Auth::user();
        	$taller   = Taller::find($id);
        	$flag=true;

        	foreach ($usuario->talleres as $taller_user) {
        		if($taller_user->id==$id){
        			$flag=false;
        		}
        	}
        	if(!$flag){
        		Session::flash('message','Ya se encuentra inscrito en este taller');
        		return Redirect('/talleres/mis-inscripciones');
        	}
        	else{
                $taller->vacantes=$taller->vacantes-1;
                $taller->save();
    	    	$usuario->talleres()->attach($id,['precio'=> $taller->precio_base]);

    	    	Session::flash('message','La Inscripción fue realizada Correctamente');
    	    	return Redirect('/talleres/mis-inscripciones');
        	}
        }
        else{
            Session::flash('message-error','Contraseña incorrecta');
            return Redirect("/talleres/".$id."/confirm");
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
        $taller = Taller::find($id);
        $talleres_user  = Auth::user()->talleres;
        return view('socio.talleres.consulta', compact('taller','talleres_user'));
    }

    public function confirmInscription($id)
    {  
        $usuario  = Auth::user();
    	$taller   = Taller::find($id);
    	$flag=true;

    	foreach ($usuario->talleres as $taller_user) {
    		if($taller_user->id==$id){
    			$flag=false;
    		}
    	}
    	if(!$flag){
    		Session::flash('message','Ya se encuentra inscrito en este taller');
    		return Redirect('/talleres/index');
    	}
    	else{
	    	return view('socio.talleres.confirmacion-inscripcion', compact('taller'));
    	}

        
    }

    public function misinscripciones()
    {
    	$usuario  = Auth::user();
    	$talleres = \papusclub\Models\Taller::All();
        return view('socio.talleres.inscripciones', compact('talleres'));
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
    public function removeInscriptionToUser($id)
    {
    	$usuario  = Auth::user();
        $taller   = Taller::find($id);

        $taller->vacantes=$taller->vacantes+1;
        $taller->save();
        $usuario->talleres()->detach([$id]);

        return back();
    }
}
