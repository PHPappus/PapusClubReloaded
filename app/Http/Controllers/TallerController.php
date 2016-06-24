<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use DateTime;
use papusclub\Models\Taller;
use papusclub\Models\TarifaTaller;
use papusclub\Models\Ambiente;
use papusclub\Models\Sede;
use papusclub\Models\TipoPersona;
use papusclub\Http\Requests\StoreTallerRequest;
use papusclub\Http\Requests\EditTallerRequest;

use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class TallerController extends Controller
{
    public function index()
    {
        $talleres = Taller::all();
        $carbon=new Carbon();
        foreach ($talleres as $taller) {
            $taller->fecha_inicio_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio_inscripciones)->format('d/m/Y');
            $taller->fecha_fin_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin_inscripciones)->format('d/m/Y');
            $taller->fecha_inicio=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio)->format('d/m/Y');
            $taller->fecha_fin=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin)->format('d/m/Y');
        }
        return view('admin-registros.taller.index',compact('talleres'));
    }

    public function create()
    {
        $sedes = Sede::all();
        $ambientes = Ambiente::all();
        $personas = TipoPersona::all();

       // return view('admin-general.ambiente.searchAmbiente', compact('ambientes'),compact('values'),compact('tipoPersonas'));
    	return view('admin-registros.taller.newTaller', compact('sedes','ambientes','personas'));
    }

    public function show($id)
    {
        $taller = Taller::find($id);
        $carbon = new Carbon();
        $taller->fecha_inicio_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio_inscripciones)->format('d/m/Y');
        $taller->fecha_fin_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin_inscripciones)->format('d/m/Y');
        $taller->fecha_inicio=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio)->format('d/m/Y');
        $taller->fecha_fin=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin)->format('d/m/Y');
        return view('admin-registros.taller.showTaller',compact('taller'));
    }

    public function edit ($id)
    {

        $taller = Taller::find($id);
        $carbon = new Carbon();
        $taller->fecha_inicio_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio_inscripciones)->format('d/m/Y');
        $taller->fecha_fin_inscripciones=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin_inscripciones)->format('d/m/Y');
        $taller->fecha_inicio=$carbon->createFromFormat('Y-m-d', $taller->fecha_inicio)->format('d/m/Y');
        $taller->fecha_fin=$carbon->createFromFormat('Y-m-d', $taller->fecha_fin)->format('d/m/Y');
        return view('admin-registros.taller.editTaller',compact('taller'));
    }

    public function store(StoreTallerRequest $request)
    {
        $input = $request->all();             

        $carbon=new Carbon(); 
        $taller = new Taller();
        $taller->nombre = $input['nombre'];
        $taller->descripcion = $input['descripcion'];
        $taller->profesor = $input['profe'];


        if (empty($input['vacantes'])) {
            $taller->vacantes ="";
        }
        else
            $taller->vacantes = $input['vacantes'];

        if (empty($input['fecIniIns'])) {
            $taller->fecha_inicio_inscripciones="";
        }else{
            $fecIniIns = str_replace('/', '-', $input['fecIniIns']);      
            $taller->fecha_inicio_inscripciones=$carbon->createFromFormat('d-m-Y', $fecIniIns)->toDateString();
        }

        if (empty($input['fecFinIns'])) {
            $taller->fecha_fin_inscripciones="";
        }else{
            $fecFinIns = str_replace('/', '-', $input['fecFinIns']);      
            $taller->fecha_fin_inscripciones=$carbon->createFromFormat('d-m-Y', $fecFinIns)->toDateString();
        }

        if (empty($input['fecIni'])) {
            $taller->fecha_inicio="";
        }else{
            $fecIni = str_replace('/', '-', $input['fecIni']);      
            $taller->fecha_inicio=$carbon->createFromFormat('d-m-Y', $fecIni)->toDateString();
        }

        if (empty($input['fecFin'])) {
            $taller->fecha_fin="";
        }else{
            $fecFin = str_replace('/', '-', $input['fecFin']);      
            $taller->fecha_fin=$carbon->createFromFormat('d-m-Y', $fecFin)->toDateString();
        }


        if (empty($input['cantSes'])) {
            $taller->cantidad_sesiones ="";
        }
        else
            $taller->cantidad_sesiones = $input['cantSes'];

        $taller->save();

        //$personas = TipoPersona::all();
        $tarifas = $input['tarifas'];

        foreach($tarifas as $key => $val)
        {
            $fecha = new DateTime("now");
            $fecha=$fecha->format('Y-m-d');
            $tipo_persona = TipoPersona::find($key);
            $taller->tarifaTaller()->save($tipo_persona,['fecha_registro'=>$fecha,'precio'=>$val,'estado'=>TRUE]);
        }
        /*
        foreach ($personas as $persona) {
            $fecha = new DateTime("now");
            $fecha=$fecha->format('Y-m-d');
            $taller->tarifaTaller()->save($persona,['fecha_registro'=>$fecha,'precio'=>$input[],'estado'=>TRUE]);
        } */
        return redirect('taller')->with('stored', 'Se registró el taller correctamente.');
        //return back();
    }

    public function update(EditTallerRequest $request, $id)
    {

        $taller = Taller::find($id);
        $input = $request->all();
        $carbon = new Carbon(); 
        


        $taller->update(['nombre'=>$input['nombre'],
                        'descripcion'=>$input['descripcion'],
                        'profesor' => $input['profe'],
                        'vacantes'=>$input['vacantes']
                         ]);

        if (empty($input['fecIniIns'])) {
            $taller->fecha_inicio_inscripciones="";
        }else{
            $fecIniIns = str_replace('/', '-', $input['fecIniIns']);      
            $taller->fecha_inicio_inscripciones=$carbon->createFromFormat('d-m-Y', $fecIniIns)->toDateString();
        }

        if (empty($input['fecFinIns'])) {
            $taller->fecha_fin_inscripciones="";
        }else{
            $fecFinIns = str_replace('/', '-', $input['fecFinIns']);      
            $taller->fecha_fin_inscripciones=$carbon->createFromFormat('d-m-Y', $fecFinIns)->toDateString();
        }

        if (empty($input['fecIni'])) {
            $taller->fecha_inicio="";
        }else{
            $fecIni = str_replace('/', '-', $input['fecIni']);      
            $taller->fecha_inicio=$carbon->createFromFormat('d-m-Y', $fecIni)->toDateString();
        }

        if (empty($input['fecFin'])) {
            $taller->fecha_fin="";
        }else{
            $fecFin = str_replace('/', '-', $input['fecFin']);      
            $taller->fecha_fin=$carbon->createFromFormat('d-m-Y', $fecFin)->toDateString();
        }

        $taller->save();
        
        $tarifas = $input['tarifas'];

        foreach($tarifas as $key => $val)
        {
            $tipo_persona = TipoPersona::find($key);
            $taller->tarifaTaller()->sync([$tipo_persona->id=>['precio'=>$val]],FALSE);
        }

        return Redirect::action('TallerController@index');
    }

     public function destroy(Taller $taller){

            $taller->forceDelete();
            return back();
    }    

}
