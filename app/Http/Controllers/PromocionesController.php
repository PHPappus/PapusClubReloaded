<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Promocion;
use papusclub\Http\Requests\StorePromocionRequest;
use papusclub\Http\Requests\EditPromocionRequest;

use Carbon\Carbon;
class PromocionesController extends Controller
{
    
    public function index() {
		$promociones = Promocion::all();
        return view('admin-general.promocion.index', compact('promociones'));
	}	

	public function create()
    {
    	return view('admin-general.promocion.newPromocion');
    }
    
    public function store(StorePromocionRequest $request)
    {    	
    	$input = $request->all();
        $promociones = Promocion::all();
        $promocion = new Promocion();
    	$promocion->estado                = $input['estado'];
		$promocion->descripcion           = $input['descripcion'];
		$promocion->montoDescuento        = $input['montoDescuento'];
		$promocion->porcentajeDescuento   = $input['porcentajeDescuento'];

        // $carbon=new Carbon();
        // $a_realizarse_en = str_replace('/', '-', $input['fecha_registro']);
        // $promocion->fecha_registro=$carbon->createFromFormat('d-m-Y', $a_realizarse_en)->toDateString();
		
        $promocion->save();	        
        return redirect('promociones/index')->with('stored', 'Se registró la promocion correctamente.');
        
    }
	
	
    public function edit($id)
    {
        $promocion = Promocion::find($id);
        return view('admin-general.promocion.editPromocion', compact('promocion'));
    }

    public function update(StorePromocionRequest $request, $id)
    {
        $input = $request->all();
        $promocion = Promocion::find($id);
        $promocion->estado                = $input['estado'];
        $promocion->descripcion           = $input['descripcion'];
        $promocion->montoDescuento        = $input['montoDescuento'];
        $promocion->porcentajeDescuento   = $input['porcentajeDescuento'];
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
        return view('admin-general.promocion.detailPromocion', compact('promocion'));
    }

}
