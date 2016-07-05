<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use papusclub\Models\Provincia;

class UbicacionController extends Controller
{
		public function getProvincias(Request $request)
		{
			//$input = $request->all();
		    $departamento_id =$_POST['id']
		    $provincias = Provincia::where('departamento_id','=',$departamento_id)->get();
		     return response()->json(['data' => ['element' => $provincias]]);
		}
}
