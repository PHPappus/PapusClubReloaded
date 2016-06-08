<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Models\Provincia;

class UbicacionController extends Controller
{
		public function getProvincias()
		{
		    $departamento_id = Input::get('departamento_id');
		    $provincias = Provincia::where('departamento_id','=',$departamento_id)->get();
		    return $provincias;

		}

		public function dropdown()
		{

		$input = Input::get('option');
		$numbers = Provincia::where('departamento_id', $input)
		->orderBy('id', 'desc');

		return Response::json($numbers);
		}
}
