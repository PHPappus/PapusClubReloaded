<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use DateTime;
use papusclub\Models\Taller;
use papusclub\Models\TarifaTaller;

use Illuminate\Support\Facades\Redirect;

class TallerController extends Controller
{
    public function index()
    {
        $talleres = Taller::all();
        return view('admin-general.taller.index',compact('talleres'));
    }

    public function create()
    {
    	return view('admin-general.taller.newTaller');
    }

    public function show(Taller $taller)
    {
        return view('admin-general.taller.showTaller',compact('taller'));
    }

    public function edit ($id)
    {
        //$taller = Taller::withTrashed()->find($id);
        $taller = Taller::find($id);
        return view('admin-general.taller.editTaller',compact('taller'));
    }
}
