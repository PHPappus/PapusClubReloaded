<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Facturacion;
use papusclub\Models\Configuracion;
use papusclub\Models\Persona;
use papusclub\Models\Sede;
use papusclub\Models\Reserva;
use papusclub\Models\Ambiente;
use papusclub\Models\HistoricoIngreso;
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
     public function reporte1Final(Request $request) 
    {
        $input = $request->all();

        $sedes = Sede::find($input['sedeSelec']);

        $carbon=new Carbon;
        //obtener el responsable del reporte
        $perfilResponsable=Perfil::where('description','=','CONTROL DE INGRESOS')->first();
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
        //obtener invitados que ingresan por socio
            $ingresos=HistoricoIngreso::whereBetween('fecha',[$fechaIni,$fechaFin])->where('sede_id','=',$sedes->id)->get();
            //echo $ingresos;
            //return exit;

        //fin obtener invitados que ingresan por socio
        return view('gerente.reportes.reporte-invitados-por-sede-final',compact('sedes','fechaIni','fechaFin','fechaAct','responsable','ingresos'));
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
     public function reporte3Final(Request $request) 
    {
        $input = $request->all();
        $carbon=new Carbon;
        $sedes = Sede::find($input['sedeSelec']);
        //obtener el responsable del reporte
        $perfilResponsable=Perfil::where('description','=','ADMINISTRADOR DE RESERVA')->first();
        $responsable=User::where('perfil_id','=',$perfilResponsable->id)->get();
        //fin obtener el responsable del reporte
        //obteniendo fechas
        $year=$input['yearSelec'];
        $mes=$input['mesSelec'];
        $day=1;
        $fechaIni=$carbon->create($year,$mes,$day,0,0,0);
        $fechaFin=$carbon->create($year,$mes+1,$day,0,0,0);
        //fin obteniendo fechas
        //filtrando data
        $subtotalesP=array();
        $subtotalesD=array();
        $arrIDSocios=array();
        $socios=Socio::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
        $reservas=Reserva::whereBetween('fecha_inicio_reserva',[$fechaIni,$fechaFin])->whereBetween('fecha_fin_reserva',[$fechaIni,$fechaFin])->get();
        foreach ($ambientes as $i=> $ambiente) {
                    if($ambiente->sede->id!=$sedes->id)  unset($ambientes[$i]);
        }
        
        foreach ($reservas as $i=> $reserva) {
            $subtotal=0;
            $numDia=0;
            $thisAmbiente=null;
            foreach ($ambientes as $ambiente) {
                    if($reserva->ambiente->id==$ambiente->id){  
                        $thisAmbiente=$ambiente;
                        break;
                    }
            }
            if($thisAmbiente!=null){
                $subtotal=$reserva->precio;
                array_push($subtotalesP,$subtotal);
                $fechaInicio=$carbon->createFromFormat('Y-m-d', $reserva->fecha_inicio_reserva);
                $fechaFinaliza=$carbon->createFromFormat('Y-m-d', $reserva->fecha_fin_reserva);
                $numDia=$fechaInicio->diffInDays($fechaFinaliza);
                array_push($subtotalesD,$numDia);
                $idSocio=$reserva->persona->socio($socios);
                array_push($arrIDSocios,$idSocio->id);
            }else{
                unset($reservas[$i]);
            }
            
        }
        $totalDeuda=array_sum($subtotalesP);
        $totalDias=array_sum($subtotalesD);
        $valoresP=array_reverse($subtotalesP);
        $valoresD=array_reverse($subtotalesD);
        $valoresS=array_reverse($arrIDSocios);
        //fin filtrando data
        //arreglando mes para el reporte
        switch ($mes) {
            case 1:
                $mes='Enero';
                break;
            case 2:
                $mes='Febrero';
                break;
            case 3:
                $mes='Marzo';
                break;
            case 4:
                $mes='Abril';
                break;
            case 5:
                $mes='Mayo';
                break;
            case 6:
                $mes='Junio';
                break;
            case 7:
                $mes='Julio';
                break;
            case 8:
                $mes='Agosto';
                break;
            case 9:
                $mes='Septiembre';
                break;
            case 10:
                $mes='Octubre';
                break;
            case 11:
                $mes='Noviembre';
                break;
            case 12:
                $mes='Diciembre';
                break;
        }
        //fin arreglando mes para el reporte

        
        return view('gerente.reportes.reporte-reservas-de-bungalow-final',compact('sedes','responsable','year','mes','reservas','valoresP','totalDeuda','valoresD','totalDias','valoresS'));
    }
}
