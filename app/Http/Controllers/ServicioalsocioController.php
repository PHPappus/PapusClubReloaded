<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Http\Requests;
use papusclub\Models\Servicio;
use papusclub\Models\Sede;
use papusclub\Models\TarifarioServicio;
use papusclub\Models\Configuracion;
use papusclub\Models\TipoPersona;
use papusclub\Models\Sedexservicio;
class ServicioalsocioController extends Controller
{
   
    public function index(){	
    $sedes = Sede::all();	
   	$servicios = Servicio::all();
    $tarifarioservicios = TarifarioServicio::all();	
    $tiposServicio=Configuracion::where('grupo','=','4')->get();
    $sedexservicio = Sedexservicio::all();
        return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio'));
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
   
        return view('socio.servicios.index',compact('servicios','sedes','tarifarioservicios','tiposServicio','sedexservicio'));
    }

}
