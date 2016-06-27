<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use papusclub\Http\Requests;
use papusclub\Models\Sorteo;
use papusclub\Models\Ambiente;
use papusclub\Models\Reserva;
use papusclub\Models\Sede;
use papusclub\Models\Sorteoxsocio;
use Auth;
use papusclub\User;
use papusclub\Models\AmbientexSorteo;
use papusclub\Http\Requests\EditSorteoRequest;
use papusclub\Http\Requests\StoreSorteoRequest;
use papusclub\Http\Requests\StoreAmbientexSorteoRequest;
use papusclub\Http\Requests\StoreSocioxSorteoRequest;
use papusclub\Http\Requests\DeleteSorteoSocioRequest;
use papusclub\Models\Facturacion;


use Carbon\Carbon;

class SorteoController extends Controller
{

    public function loscohibaspapa($id)
    {
        $sorteo=Sorteo::find($id);
        $lista_socios=Sorteoxsocio::where('id','=',$id)->get();
        $lista_bungalows=AmbientexSorteo::where('id','=',$id)->get();

        $num_socios=$lista_socios->count();
        $num_bungalows=$lista_bungalows->count();
        
        //dos casos: muchos bungalows y muchas o igual personas

        foreach($lista_bungalows as $bungalow)
        {
            //Posible error reservas y foreach
            $reservas=Reserva::where('fecha_fin_reserva','=',$sorteo->fecha_cerrado)->where('fecha_inicio_reserva','=',$sorteo->fecha_abierto)->where('ambiente_id','=',$bungalow->id_ambiente)->get();
            foreach ($reservas as $reserva) {
                if(!$lista_socios->isEmpty())
                {                    
                    $temp_socio=$lista_socios->random();
                    $reserva->id_persona=$temp_socio->id_socio;
                    $reserva->save();
                    $lista_socios->pull($lista_socios->search($temp_socio));
                }
                else
                {
                    $reserva->delete();
                }
            }
            
        }
        $sorteo->estado='Ejecutado';
        $sorteo->save();
        return redirect('sorteo/index')->with('stored','Se proceso el sorteo seleccionado');
    }

    public function inscripcionDelete(DeleteSorteoSocioRequest $request)
    {
        $bungalows = Input::get('ch');
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;//CAMBIO
        
        if($bungalows!=NULL)
            foreach ($bungalows as $bungalow) {
                $sorteoxsocio=Sorteoxsocio::where('id','=',$bungalow)->where('id_socio','=',$persona_id);
                $sorteoxsocio->forceDelete();

                $pagos=Facturacion::where('persona_id','=',$persona_id)->where('sorteo_id','=',$bungalow)->get();
                foreach($pagos as $pago){
                    $pago->estado='Anulado';
                    $pago->save();
                }
            }
        //return redirect()->action('SorteoController@indexInscripcion');
        return redirect('sorteo/inscripcion/mis_sorteos')->with('stored', 'Se eliminaron los sorteos seleccionados.');
    }

    public function indexInscripcion()
    {
        $sorteos=Sorteo::where('fecha_fin_sorteo','>=',new \DateTime('today'))->get();
        $carbon=new Carbon();
        $user = Auth::user();

        $now = Carbon::now(-5);

        $sorteos_inscrito=Sorteoxsocio::where('id_socio','=',$user->id)->get();

        foreach ($sorteos as $sorteo) {
            if(!$sorteos_inscrito->isEmpty()){
                foreach ($sorteos_inscrito as $sorteo_inscrito) {
                    if($sorteo->id==$sorteo_inscrito->id)
                    {
                        $sorteos->pull($sorteos->search($sorteo));
                        break;
                    }
                    /*if($sorteo->fecha_fin_sorteo < $now)
                    {
                        $sorteos->pull($sorteos->search($sorteo));
                        break;
                    }*/
                }
            }
        }

        foreach ($sorteos as $sorteo) { 
            $sorteo->fecha_fin_sorteo=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_fin_sorteo)->format('d/m/Y');                   
            $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
            $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');        
        }
        return view('admin-general.sorteo.inscribirseSorteo',['sorteos'=>$sorteos]);
    }

    public function inscripcionStore(StoreSocioxSorteoRequest $request)
    {
        $bungalows = Input::get('ch');
        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;//CAMBIO
        
        if($bungalows!=NULL)
            foreach ($bungalows as $bungalow) {
                $sorteo=Sorteo::find($bungalow);

                $sorteoxsocio=new Sorteoxsocio();
                $sorteoxsocio->id=$bungalow;
                $sorteoxsocio->id_socio=$persona_id;
                $sorteoxsocio->save();

                $pago=new Facturacion();
                $pago->persona_id=$persona_id;
                $pago->sorteo_id=$bungalow;
                $pago->total=$sorteo->costo_inscripcion;
                $pago->tipo_pago='Efectivo';
                $pago->tipo_comprobante='Boleta';
                $pago->estado='Pagado';
                $pago->save();
            }
        //return redirect()->action('SorteoController@indexInscripcion');
        return redirect('sorteo/inscripcion')->with('stored', 'Se realizó el registro de los sorteos seleccionados.');
    }

    public function indexMisInscripciones()
    {
        $carbon=new Carbon();
        $user = Auth::user();

        $sorteos_inscrito=Sorteoxsocio::where('id_socio','=',$user->id)->get();

        $collection=collect([]);

        if(!$sorteos_inscrito->isEmpty()){
            foreach ($sorteos_inscrito as $sorteo_inscrito) {
                $sorteo=Sorteo::where('id','=',$sorteo_inscrito->id)->get()->first();
                $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
                $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');
                $collection->push($sorteo);
            }
        }

        $sorteos=$collection->all();

        return view('admin-general.sorteo.indexMisSorteos',['sorteos'=>$sorteos]);

        //return redirect()->action('SorteoController@bungalows',['id'=>$sorteo->id]);
    }

    public function index()
    {
        $sorteos=Sorteo::all();
        $carbon=new Carbon();
        foreach ($sorteos as $sorteo) {
            $sorteo->fecha_fin_sorteo=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_fin_sorteo)->format('d/m/Y');
            $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
            $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');
        }
        return view('admin-general.sorteo.index',['sorteos'=>$sorteos]);
    }

    public function create()
    {
        $sedes = Sede::all();
        
        return view('admin-general.sorteo.newSorteo',['sedes'=>$sedes]);
    }


    public function storeBungalows(StoreAmbientexSorteoRequest $request, $id){
        $bungalows = Input::get('ch');
        $sorteo=Sorteo::where('id',$id)->first();

        $user_id = Auth::user()->id;
        $usuario = User::find($user_id);
        $persona_id = $usuario->persona->id;//CAMBIO

        if($bungalows!=NULL)
            foreach ($bungalows as $bungalow) {
                $ambienteXsorteo=new AmbientexSorteo();
                $ambienteXsorteo->id=$id;
                $ambienteXsorteo->id_ambiente=$bungalow;
                $ambienteXsorteo->save();

                $reserva=new Reserva();
                $reserva->fecha_inicio_reserva=$sorteo->fecha_abierto;
                $reserva->fecha_fin_reserva=$sorteo->fecha_cerrado;
                $reserva->ambiente_id=$bungalow;
                $reserva->id_persona=$persona_id;
                $reserva->precio=$sorteo->costo_inscripcion;
                $reserva->estadoReserva='Activo';
                $reserva->save();
            }
        return redirect('sorteo/index')->with('stored', 'Se registró el producto correctamente.');
        //return view('admin-general.sorteo.prueba',['nombres'=>$bungalows]);
    }

    public function removeCheckedBungalows(StoreAmbientexSorteoRequest $request, $id){
        $bungalows = Input::get('ch');
        $sorteo=Sorteo::find($id);        
        $ambienteXsorteo = AmbientexSorteo::where('id','=',$id)->get();
        if($bungalows!=NULL)            
            foreach ($ambienteXsorteo as $temp) {
                foreach ($bungalows as $bungalow) {
                    if($temp->id_ambiente==$bungalow)
                    {
                        $reservas=Reserva::where('fecha_fin_reserva','=',$sorteo->fecha_cerrado)->where('fecha_inicio_reserva','=',$sorteo->fecha_abierto)->where('ambiente_id','=',$bungalow)->get();
                        foreach ($reservas as $reserva) {
                            $reserva->delete();                            
                        }
                        $temp->delete();
                        break;
                    }
            }
        }
        return redirect()->action('SorteoController@correccionUnica',['id'=>$sorteo->id]);
        //return view('admin-general.sorteo.prueba',['nombres'=>$bungalows]);
    }

    public function correccionUnica($id){
        $sorteo = Sorteo::find($id);
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('sede_id','=',$sorteo->id_sede)->where('estado','!=','Deshabilitado')->get();

        //las reservas inician en el rango del sorteo
        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //las reservas terminan en el rango del sorteo
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //$reservas_caso_2=Reserva::where('fecha_fin_reserva','>=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','<=',$sorteo->fecha_cerrado)->get();
        //El rango del sorteo encierra una reserva
        $reservas_caso_3=Reserva::where('fecha_inicio_reserva','<=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','>=',$sorteo->fecha_cerrado)->get();
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_1 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_2 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_3 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        return view('admin-general.sorteo.modifySorteoBungalows',['sorteo'=>$sorteo],['ambientes'=>$ambientes]);
    }

    public function show($id)
    {
        $sorteo=Sorteo::where('id',$id)->first();
        $carbon=new Carbon();
        $sorteo->fecha_fin_sorteo=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_fin_sorteo)->format('d/m/Y');
        $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
        $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');

        $lista_bungalows=AmbientexSorteo::where('id','=',$id)->get();        

        $collection=collect([]);

        foreach ($lista_bungalows as $temp) {
            $ambiente_temp=Ambiente::where('id','=',$temp->id_ambiente)->get();
            $id_temp_cochino=$temp->id_ambiente;
            $collection=collect([$ambiente_temp]);
            break;
        }

        foreach ($lista_bungalows as $bungalow_spec) {            
            if($id_temp_cochino!=$bungalow_spec->id_ambiente){
                $ambiente=Ambiente::where('id','=',$bungalow_spec->id_ambiente)->get();
                $collection->push($ambiente);
            }
            
        }

        $sede=Sede::find($sorteo->id_sede)->first();


        $ambientes=$collection->all();
        return view('admin-general.sorteo.detailSorteo',['sorteo'=>$sorteo,'ambientes'=>$ambientes,'sede'=>$sede]);
    }

    public function store(StoreSorteoRequest $request)
    {
        $input = $request->all();
        $sorteo= new Sorteo();
        $carbon=new Carbon();         

        $sorteo->nombre_sorteo=$input['nombre_sorteo'];
        $sorteo->descripcion=$input['descripcion'];
        $sorteo->id_sede=$input['sedeSelec'];
        $sorteo->costo_inscripcion=$input['precio'];

        $date = str_replace('/', '-', $input['fecha_abierto']);
        $temp = $carbon->createFromFormat('d-m-Y', $date)->toDateString();

        $sorteo->fecha_fin_sorteo =$carbon::parse($temp)->addDays(-7);

        //$date = str_replace('/', '-', $input['fecha_abierto']);      
        $sorteo->fecha_abierto=$carbon->createFromFormat('d-m-Y', $date)->toDateString();

        $date = str_replace('/', '-', $input['fecha_cerrado']);      
        $sorteo->fecha_cerrado=$carbon->createFromFormat('d-m-Y', $date)->toDateString();
        
        $sorteo->save();
        //return redirect('sorteo/new/sorteo/bungalows');//->with('stored', 'Se registró el producto correctamente.'); ,['sorteo'=>$sorteo]
        return redirect()->action('SorteoController@bungalows',['id'=>$sorteo->id]);//->route('sorteo/new/sorteo/bungalows',[$sorteo]);
    }

    public function update(EditSorteoRequest $request, $id)
    {
        $input = $request->all();
        $sorteo = Sorteo::find($id);

        $carbon=new Carbon();

        $sorteo->nombre_sorteo = $input['nombre_sorteo'];
        $sorteo->descripcion = $input['descripcion'];        
        $sorteo->save();
        return redirect()->action('SorteoController@removebungalows',['id'=>$id]);//return redirect('sorteo/index')->with('stored', 'Se actualizó el producto correctamente.');
    }

    public function removebungalows($id){

        $lista_bungalows=AmbientexSorteo::where('id','=',$id)->get();        
         $collection=collect([]);

        foreach ($lista_bungalows as $temp) {
            $ambiente_temp=Ambiente::where('id','=',$temp->id_ambiente)->get();
            $id_temp_cochino=$temp->id_ambiente;
            $collection=collect([$ambiente_temp]);
            break;
        }

        foreach ($lista_bungalows as $bungalow_spec) {            
            if($id_temp_cochino!=$bungalow_spec->id_ambiente){
                $ambiente=Ambiente::where('id','=',$bungalow_spec->id_ambiente)->get();
                $collection->push($ambiente);
            }
        }

        $ambientes=$collection->all();
        return view('admin-general.sorteo.detailSorteoRemoverBungalows',['ambientes'=>$ambientes,'id'=>$id]);
    }

    public function bungalows($id){
        $sorteo = Sorteo::find($id);
        $ambientes=Ambiente::where('tipo_ambiente','=','Bungalow')->where('sede_id','=',$sorteo->id_sede)->where('estado','!=','Deshabilitado')->get();

        //las reservas inician en el rango del sorteo
        $reservas_caso_1=Reserva::whereBetween('fecha_inicio_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //las reservas terminan en el rango del sorteo
        $reservas_caso_2=Reserva::whereBetween('fecha_fin_reserva', [$sorteo->fecha_abierto, $sorteo->fecha_cerrado])->get();
        //$reservas_caso_2=Reserva::where('fecha_fin_reserva','>=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','<=',$sorteo->fecha_cerrado)->get();
        //El rango del sorteo encierra una reserva
        $reservas_caso_3=Reserva::where('fecha_inicio_reserva','<=',$sorteo->fecha_abierto)->where('fecha_fin_reserva','>=',$sorteo->fecha_cerrado)->get();
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_1 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_2 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        foreach ($ambientes as $ambiente) {
            foreach ($reservas_caso_3 as $reserva) {
                if($reserva->ambiente_id==$ambiente->id) $ambiente->nombre='nada';
            }
        }
        return view('admin-general.sorteo.newSorteoBungalows',['sorteo'=>$sorteo],['ambientes'=>$ambientes]);
    }

       public function edit($id)
    {
        $sorteo=Sorteo::where('id',$id)->first();
        $carbon=new Carbon();
        $sorteo->fecha_fin_sorteo=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_fin_sorteo)->format('d/m/Y');
        $sorteo->fecha_abierto=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_abierto)->format('d/m/Y');
        $sorteo->fecha_cerrado=$carbon->createFromFormat('Y-m-d', $sorteo->fecha_cerrado)->format('d/m/Y');



        $sede=Sede::find($sorteo->id_sede)->first();

        
        return view('admin-general.sorteo.editSorteo',['sorteo'=>$sorteo,'sede'=>$sede]);
    }

    public function destroy($id)
    {
        $sorteo=Sorteo::find($id);
        //Reviso si hay bungalows asociados
        $lista_bungalows=AmbientexSorteo::where('id','=',$id)->get(); 

        if($lista_bungalows->isEmpty())
        {
            $sorteo->forceDelete();
        }
        else
        {
            $sorteo->delete();
        }
        return redirect('sorteo/index');
    }

    public function atras($id)
    {
        $sorteo=Sorteo::find($id);
        $sorteo->forceDelete();
        return redirect('sorteo/new');
    }

    public function nuke($id)
    {
        $sorteo=Sorteo::find($id);
        $sorteo->forceDelete();
        return redirect('sorteo/index');
    }
}
