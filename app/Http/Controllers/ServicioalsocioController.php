<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Http\Requests;
use papusclub\Models\Servicio;
use papusclub\Models\Sede;
use papusclub\Models\Socio;
use papusclub\Models\TarifarioServicio;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Models\Sedexservicio;
use papusclub\Models\ServicioxSedexPersona;
use Session;
use Redirect;
use papusclub\User;
use papusclub\Models\Persona;
use Auth;
use Hash;
use Carbon\Carbon;


class ServicioalsocioController extends Controller
{
    public function filtromisinscripciones(Request $request){
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        // Se extrae lo mismo del index
        $sedes = Sede::all();   
        $servicios = Servicio::all();
        $estadosregistros = array();
        $tarifarioservicios = TarifarioServicio::where('idtipopersona','=','1')->get();  // socio
        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $sedexservicioall = Sedexservicio::all();    
        $mensaje = Null ; 
        
        // Pero solo se extrae la informacion concerniente  a la persona 
        $sedexservicioxpersona = ServicioxSedexPersona::where('id_persona','=',$persona_id)->get();

        $sedexservicio = array();
        foreach ($sedexservicioall as $sxsall){
                foreach ($sedexservicioxpersona as $sxsxper){
                        if($sxsall->idsede == $sxsxper->id_sede 
                            & $sxsall->idservicio== $sxsxper->id_servicio){
                            array_push($sedexservicio, $sxsall);
                            break;
                        }
                }
        }
        $input= $request->all(); // 941802191
        
            // Fitrado pes LOL 
            $sedexservicioaux = array();
            if ($input['sedeSelec']==-1) {
                $sedexservicioaux = $sedexservicio;
            }else{                
                foreach ($sedexservicio as $sst) {                        
                    if ($sst->idsede == $input['sedeSelec'] ){
                        array_push($sedexservicioaux,$sst);
                    }            
                }       
            }
                $sedexservicio = $sedexservicioaux;
        //return view('socio.servicios.prueba2',compact('sedexservicioxpersona'));
            return view('socio.servicios.serviciosinscritos',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','mensaje'));    

    }
   public function misinscripciones(){
        // Identificacion persona_id 
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;

        // Se extrae lo mismo del index
        $sedes = Sede::all();   
        $servicios = Servicio::all();
        $estadosregistros = array();
        $tarifarioservicios = TarifarioServicio::where('idtipopersona','=','1')->get();  // socio
        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $sedexservicioall = Sedexservicio::all();    
        $mensaje = Null ; 
        
        // Pero solo se extrae la informacion concerniente  a la persona 
        $sedexservicioxpersona = ServicioxSedexPersona::where('id_persona','=',$persona_id)->get();

        $sedexservicio = array();
        foreach ($sedexservicioall as $sxsall){
                foreach ($sedexservicioxpersona as $sxsxper){
                        if($sxsall->idsede == $sxsxper->id_sede 
                            & $sxsall->idservicio== $sxsxper->id_servicio){
                            array_push($sedexservicio, $sxsall);
                            break;
                        }
                }
        }

        //return view('socio.servicios.prueba2',compact('sedexservicioxpersona'));
            return view('socio.servicios.serviciosinscritos',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','mensaje'));
   }

    public function index(){	

            $sedes = Sede::all();	
            	$servicios = Servicio::all();
            $estadosregistros = array();
            $tarifarioservicios = TarifarioServicio::all();	
            $tiposServicio=Configuracion::where('grupo','=','4')->get();
            $sedexservicio = Sedexservicio::all();
            $sedexservicioxpersona = ServicioxSedexPersona::all();
            $mensaje = Null ; 
            return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','sedexservicioxpersona', 'mensaje'));
    }

    public function filtroServicio(Request $request){
    // datos de entrada 
    $input= $request->all(); // 941802191
	    
    // Fitrado pes LOL 
	$sedexserviciotodo = Sedexservicio::all();	
    if ($input['sedeSelec']==-1) {
    	$sedexservicio = Sedexservicio::all();	
    }else{
    	$sedexservicio=array();
        foreach ($sedexserviciotodo as $sst) {                        
            if ($sst->idsede == $input['sedeSelec'] ){
                array_push($sedexservicio,$sst);
            }            
        }    	
    }
            
    $sedes = Sede::all();	
   	$servicios = Servicio::all();
    $tarifarioservicios = TarifarioServicio::all();	
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $mensaje = NUll;
    $sedexservicioxpersona = ServicioxSedexPersona::all();
        return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','mensaje','sedexservicioxpersona'));
    }

    public function confirmareleccionsave($id){

    $sedes = Sede::all();   
    $servicios = Servicio::all();
    $estadosregistros = array();
    $tarifarioservicios = TarifarioServicio::all(); 
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $sedexservicio = Sedexservicio::all();
    $sedexservicioxpersona = ServicioxSedexPersona::all();
    $mensaje = "Usted se ha registrado a este servicio !" ; 

        /*Este codigo no funciona Si pero no se usa*/
        
    $user_id = Auth::user()->id;
    $usuario = User::findOrFail($user_id);
    $persona_id = $usuario->persona->id;


    $newsxsxp = new ServicioxSedexPersona();    

    $sedxser = Sedexservicio::where('id','=',$id)->first();     

    $tarifserv = TarifarioServicio::where('idservicio','=',$sedxser->idservicio)->first();

    $newsxsxp->id_servicio  = $sedxser->idservicio;
    $newsxsxp->id_sede  = $sedxser->idsede;
    $newsxsxp->calificacion = -1 ; 

    $newsxsxp->id_persona = $persona_id;
    $newsxsxp->precio = $tarifserv->precio;
    $newsxsxp->save();
        

    /*return view('socio.servicios.prueba',compact('sedexservicio','tarifserv'));
    */
        $sedexservicioxpersona = ServicioxSedexPersona::all();
    return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','sedexservicioxpersona','mensaje'));
    }
    public function confirmareleccion(Request $request, $id){

        /*Este codigo no funciona Si pero no se usa*/
        
        $user_id = Auth::user()->id;
        $usuario = User::findOrFail($user_id);
        $persona_id = $usuario->persona->id;
        $personas = Persona::find($persona_id);
        $codigo = 1 ;
        

        // Busco la sede x servicio en base al ID
        $sedexservicio = Sedexservicio::find($id); 
        $servicindentificado = Servicio::where('id','=',$sedexservicio->idservicio)->get();        
            $servxsedexpersonatodos = ServicioxSedexPersona::all();
        $foo = false ; 
        $mensaje  = "";

        foreach ($servxsedexpersonatodos as $sxsxp){
                    if ($sxsxp->id_persona==$codigo 
                        && $sxsxp->id_sede == $sedexservicio->idsede 
                        && $sxsxp->id_servicio == $sedexservicio->idservicio){
                        $foo = true ; 
                        $mensaje  = "Usted ya esta inscrito en este servicio";
                        break;
                    }
                }

            $sedes = Sede::all();   
            $servicios = Servicio::all();
            $estadosregistros = array();
            $tarifarioservicios = TarifarioServicio::all(); 
            $tiposServicio=Configuracion::where('grupo','=','4')->get();
            $sedexservicio = Sedexservicio::all();
            $ser = null ; 
            foreach ($servicindentificado as $sidenti){
                $ser = $sidenti;
            }
            $tip_s = null ; 
            foreach($tiposServicio as $tp){
                if ($ser->tipo_servicio == $tp->id ){
                        $tip_s = $tp->valor;
                        break;
                }
            }
            $precio = null ; 
            foreach ($tarifarioservicios as $ts){
                if ($ts->idservicio == $ser->id && $ts->idtipopersona == 1 ){
                        $precio = $ts->precio ; 
                }

            }

        if ($foo){            
            $mensaje  = "Usted ya esta inscrito en este servicio";             
            $sedexservicioxpersona = ServicioxSedexPersona::all();
            return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','mensaje','tip_s','precio','sedexservicioxpersona'));
        }else{        

            return view('socio.servicios.indexdetalle',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio','id','servicindentificado','tip_s','precio'));
        }





        /*$taller   = Taller::find($id);
        $flag=true;

        $talleresxpersona  = Persona::where('id_usuario','=',Auth::user()->id)->first()-
        >talleres;
        foreach ($talleresxpersona as $tallerxpersona) {
            if($tallerxpersona->id==$id){
                $flag=false;
            }
        }
        if(!$flag){
            Session::flash('message','Ya se encuentra inscrito en este taller');
            $sedes  = Sede::all();
            $talleres=Taller::where('fecha_inicio_inscripciones','>=',Carbon::now())->get();
            
            return view('socio.talleres.index',compact('sedes','talleres','talleresxpersona'));
        }
        else{
            return view('socio.talleres.confirmacion-inscripcion', compact('taller'));
        }

        */

    }

}
