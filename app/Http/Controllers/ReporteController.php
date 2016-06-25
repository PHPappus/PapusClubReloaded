<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Models\Persona;
use papusclub\Models\Sede;
use Auth;
use Carbon\Carbon;
use papusclub\User;
use papusclub\Perfil;

class ReporteController extends Controller
{
    //REporte1 : Cuantos invitados hubo por sede por mes
    public function reporte1() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-invitados-por-sede',compact('sedes'));
    }
     public function reporte1Final() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-invitados-por-sede-final',compact('sedes'));
    }
    //Reporte 2: cuantas personas deben dentro de un rango de fecha
    public function reporte2() 
    {
        $sedes = Sede::all();   
        return view('gerente.reportes.reporte-morosos',compact('sedes'));
    }
     public function reporte2Final(Request $request) 
    {
        $sedes = Sede::all();
        $input = $request->all();
        $carbon=new Carbon;
        //obtener el responsable del reporte
        $perfilResponsable=Perfil::where('description','=','ADMINISTRADOR DE PAGOS')->first();
        $responsable=User::where('perfil_id','=',$perfilResponsable->id)->get();
        //fin obtener el responsable del reporte

        
        //obtener fechas
        $fechaIni=new Carbon('America/Lima');
        $fechaFin=new Carbon('America/Lima');
        $fechaAct=new Carbon('America/Lima');
        if(!empty($input['fecha_inicio'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_inicio']);
            $fechaIni=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
        }
        if(!empty($input['fecha_fin'])){
            $a_realizarse_en = str_replace('/', '-', $input['fecha_fin']);
            $fechaFin=$carbon->createFromFormat('d-m-Y', $a_realizarse_en);
        }
        //fin obtener fechas

        //obtener socios morosos
        $socios=Socio::all();
        $subtotales=array();
        foreach ($socios as $key => $socio) {
                $subtotal=0;
                $facturaciones = $socio->postulante->persona->facturacion;
                if(count($facturaciones)!=0){
                    foreach ($facturaciones as $i => $facturacion) {
                        if($facturacion->estado=='Emitido'){
                            $subtotal=$subtotal+$facturacion->total;
                        }

                    }
                }else{
                    unset($socios[$key]);
                }
                if($subtotal==0){
                    unset($socios[$key]);
                }else{
                    array_push($subtotales,$subtotal);
                }
        }
        
        $totalDeuda=array_sum($subtotales);
        
        $valores=array_reverse($subtotales);
        //fin obtener socios morosos
        return view('gerente.reportes.reporte-morosos-final',compact('sedes','responsable','fechaIni','fechaFin','fechaAct','socios','totalDeuda','valores'));
    }
    //Reporte 3:cuantas veces se reserva un bunalow en un rango de fecha 
    public function reporte3() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-reservas-de-bungalow',compact('sedes'));
    }
     public function reporte3Final() 
    {
        $sedes = Sede::all();
        return view('gerente.reportes.reporte-reservas-de-bungalow-final',compact('sedes'));
    }
}
