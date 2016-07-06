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
        $sedes = Sede::all();
        $mytime = Carbon::now(-5);
        echo $mytime;
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')/*->where('estado','!=','Deshabilitado')*/->get();
        foreach($ambientes as $ambiente)
        {
            $bungalowsIna=Mantenimiento::where('id_bungalow','=',$ambiente->id)->get();
            foreach ($bungalowsIna as $bungalowIna) {
                if($bungalowIna->fecha_inicio<=$mytime && $bungalowIna->fecha_fin>=$mytime)
                {
                    $ambientes->pull($ambientes->search(Ambiente::find($bungalowIna->id_bungalow)));
                }
            }
        }
        return view('admin-general.mantenimiento-bungalows.indexCorr',['ambientes'=>$ambientes,'sedes'=>$sedes]);
    }

    public function deshabilitarBungalows(DeshabilitarBungalowsRequest $request,$id)
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

    public function deshabilitarDetalle($id)
    {
        $configuracion="0";
        return view('admin-general.mantenimiento-bungalows.deshabilitarDetalle',['id'=>$id,'configuracion'=>$configuracion]);
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
