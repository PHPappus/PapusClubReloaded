<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Promocion;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StorePromocionRequest;
use papusclub\Http\Requests\EditPromocionRequest;
use Log;
use Carbon\Carbon;
class PromocionesController extends Controller
{
    
    public function index() {
        $promociones = Promocion::all();
        return view('admin-registros.promocion.index', compact('promociones'));
    }   

    public function create()
    {
        $tipos = Configuracion::where('grupo','=',15)->get();
        return view('admin-registros.promocion.newPromocion',compact('tipos'));
    }
    
    public function store(StorePromocionRequest $request)
    {       
        $input = $request->all();
        //$promociones = Promocion::all();
        $promocion = new Promocion();
        $promocion->estado                = TRUE;
        $promocion->descripcion           = $input['descripcion'];
        $promocion->porcentajeDescuento   = $input['porcentajeDescuento'];
        $promocion->tipo                  = $input['tipoPromo'];

        // $carbon=new Carbon();
        // $a_realizarse_en = str_replace('/', '-', $input['fecha_registro']);
        // $promocion->fecha_registro=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        
        $promocion->save();         
        return redirect('promociones/index')->with('stored', 'Se registró la promocion correctamente.');
        
    }
    
    
    public function edit($id)
    {
        $tipos = Configuracion::where('grupo','=',15)->get();
        $promocion = Promocion::find($id);
        return view('admin-registros.promocion.editPromocion', compact('promocion','tipos'));
    }

    public function update(StorePromocionRequest $request, $id)
    {
        $input = $request->all();
        $promocion = Promocion::find($id);
        $promocion->descripcion           = $input['descripcion'];
        $promocion->porcentajeDescuento   = $input['porcentajeDescuento'];
        $promocion->tipo                  = $input['tipoPromo'];

        if (isset($input['estado']))
        {
            $promocion->estado = TRUE;
        }
        else
        {
            $promocion->estado = FALSE;
        }
        // $carbon=new Carbon();
        // $a_realizarse_en = str_replace('/', '-', $input['fecha_registro']);
        // $promocion->fecha_registro=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
        
        $promocion->save();         
        return redirect('promociones/index')->with('stored', 'Se modifico la promocion correctamente.');

    }

    public function destroy($id)    
    {
        $promocion = Promocion::find($id);
        $promocion->delete();
        return back();
    }

    public function show($id)
    {
        $promocion = Promocion::find($id);
        return view('admin-registros.promocion.detailPromocion', compact('promocion'));
    }

}
