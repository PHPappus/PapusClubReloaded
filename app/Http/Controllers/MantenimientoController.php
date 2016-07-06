<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Ambiente;
use papusclub\Models\Reserva;
use papusclub\Models\Sede;
use papusclub\Models\Sorteo;
use papusclub\Models\Mantenimiento;
use papusclub\Models\AmbientexSorteo;
use papusclub\Http\Requests\DeshabilitarBungalowsRequest;
use papusclub\Http\Requests\HabilitarBungalowsRequest;

use Carbon\Carbon;

class MantenimientoController extends Controller
{
    public function indexPrev()
    {
        try
        {
            $sedes = Sede::all();
            $mytime = Carbon::now();
            echo $mytime;
            $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->get();
            if(!$ambientes->isEmpty())
            {
                echo "primera";
                foreach($ambientes as $ambiente)
                {
                    echo "segunda";
                    $bungalowsIna=Mantenimiento::where('id_bungalow','=',$ambiente->id)->get();
                        
                    echo "tercera";
                    foreach ($bungalowsIna as $bungalowIna) {
                        echo "cuarta";
                        if($bungalowIna->fecha_inicio<=$mytime && $bungalowIna->fecha_fin>=$mytime)
                        {
                            echo "quinta";
                            $ambientes->pull($ambientes->search(Ambiente::find($bungalowIna->id_bungalow)));
                        }
                    }
                }
                return view('admin-general.mantenimiento-bungalows.indexCorr',['ambientes'=>$ambientes,'sedes'=>$sedes]);
            }
                
        }
        catch (\Exception $e)
        {
            $error = 'indexPrev-MatenimientoController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function deshabilitarBungalows(DeshabilitarBungalowsRequest $request,$id)
    {
        try
        {
            $carbon= new Carbon();

            $input = $request->all();
            $nuevo = new Mantenimiento();
            $nuevo->id_bungalow=$id;
            $date = str_replace('/', '-', $input['fecha_cerrado']);      
            $nuevo->fecha_fin=$carbon->createFromFormat('d-m-Y', $date)->toDateString();
            $date = str_replace('/', '-', $input['fecha_abierto']);
            $nuevo->fecha_inicio=$carbon->createFromFormat('d-m-Y', $date)->toDateString();;        
            $nuevo->descripcion="generico";
            $nuevo->estado="Activo";
            $nuevo->save();
            return redirect('mantBungalowPrev/index');            
        }
        catch (\Exception $e)
        {
            $error = 'deshabilitarBungalows-MatenimientoController';
            return view('errors.corrigeme', compact('error'));
        }

    }

    public function deshabilitarDetalle($id)
    {
        try
        {
            $configuracion="0";
            return view('admin-general.mantenimiento-bungalows.deshabilitarDetalle',['id'=>$id,'configuracion'=>$configuracion]);
        }
        catch (\Exception $e)
        {
            $error = 'deshabilitarDetalle-MatenimientoController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function indexPrevHabilitar()
    {
        try
        {
            $sedes = Sede::all();
            $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('estado','=','Deshabilitado')->get();
            return view('admin-general.mantenimiento-bungalows.indexCorrHabilitar',['ambientes'=>$ambientes,'sedes'=>$sedes]);
        }
        catch (\Exception $e)
        {
            $error = 'indexPrevHabilitar-MatenimientoController';
            return view('errors.corrigeme', compact('error'));
        }
    }

    public function habilitarBungalows(HabilitarBungalowsRequest $request)
    {
        try
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
        catch (\Exception $e)
        {
            $error = 'habilitarBungalows-MatenimientoController';
            return view('errors.corrigeme', compact('error'));
        }
    }
}
