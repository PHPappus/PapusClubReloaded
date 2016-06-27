<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Reserva;
use papusclub\Models\Sede;
use papusclub\Models\Sorteo;
use papusclub\Models\AmbientexSorteo;
use papusclub\Http\Requests\DeshabilitarBungalowsRequest;
use papusclub\Http\Requests\HabilitarBungalowsRequest;

use Carbon\Carbon;

class MantenimientoController extends Controller
{
    public function indexPrev()
    {
        $sedes = Sede::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado','!=','Deshabilitado')->get();
        return view('admin-general.mantenimiento-bungalows.indexCorr',['ambientes'=>$ambientes,'sedes'=>$sedes]);
    }

    public function deshabilitarBungalows(DeshabilitarBungalowsRequest $request)
    {
        $bungalows = Input::get('ch');
        $mytime = Carbon::now();
        if($bungalows!=NULL)            
            foreach ($bungalows as $bungalow) {
                $temp=Ambiente::find($bungalow);
                $temp->estado='Deshabilitado';

                $reservas=Reserva::where('ambiente_id','=',$bungalow)->where('fecha_fin_reserva','>=',$mytime)->get();
                foreach ($reservas as $reserva) {
                    if($reserva->estado=='Ejecutado'){
                        /*$reserva->estado='Cancelado';

                        $pagos=Facturacion::where('persona_id','=',$persona_id)->where('sorteo_id','=',$bungalow)->get();
                        foreach($pagos as $pago){
                            $pago->estado='Anulado';
                            $pago->save();
                        }

                        $*/
                    }
                    $reserva->delete();
                }

                $sorteos=Sorteo::where('estado','=','Activo');
                foreach ($sorteos as $sorteo) {
                    $lista_bungalows=AmbientexSorteo::where('id_ambiente','=',$bungalow)->where('id','=',$sorteo->id)->get();
                    foreach ($lista_bungalows as $temp) {
                        $temp->delete();
                    }
                }

                $temp->save();
            }
        return redirect('mantBungalowPrev/index');
    }
    public function indexPrevHabilitar()
    {
        $sedes = Sede::all();
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado','=','Deshabilitado')->get();
        return view('admin-general.mantenimiento-bungalows.indexCorrHabilitar',['ambientes'=>$ambientes,'sedes'=>$sedes]);
    }

    public function habilitarBungalows(HabilitarBungalowsRequest $request)
    {
        $bungalows = Input::get('ch');
        if($bungalows!=NULL)            
            foreach ($bungalows as $bungalow) {
                $temp=Ambiente::find($bungalow);
                $temp->estado='Activo';
                $temp->save();
            }
        return redirect('mantBungalowPrev/indexHabilitar');
    }
}
