<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;

use papusclub\Http\Requests;
use Carbon\Carbon;
use papusclub\Http\Requests\StoreTerceroRequest;

class TerceroController extends Controller
{
     public function index()
    {
        //$match = ['id_tipo_persona'=>1,'doc_identidad'=>$numerodoc];
        $personas=Persona::where('id_tipo_persona','=','3')->get();
        return view('admin-persona.persona.tercero.index', compact('personas'));
    }

    public function show($id)
    {
        $persona = Persona::find($id);
        $carbon=new Carbon();
        if((strtotime($persona['fecha_nacimiento']) < 0))
            $persona->fecha_nacimiento=NULL;
        else
            $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

        return view('admin-persona.persona.tercero.detailTercero',compact('persona'));
    }

    public function registrar()
    {
        return view('admin-persona.persona.tercero.newTercero');
    }

    public function store(StoreTerceroRequest $request)
    {       
        $input = $request->all();
        $persona = new Persona();
        $carbon=new Carbon(); 
        $nacionalidad = $input['nacionalidad'];
        $persona->nacionalidad = $nacionalidad;

        if($nacionalidad=='peruano')
        {
            $doc_identidad = $input['doc_identidad'];
            $personaBuscada = Persona::where(['doc_identidad'=>$doc_identidad])->get()->first();
        }
        else
        {
            $carnet_extranjeria = $input['carnet_extranjeria'];
            $personaBuscada=Persona::where(['carnet_extranjeria'=>$carnet_extranjeria])->get()->first();
        }

        if($personaBuscada==null)
        {
            if (empty($input['carnet_extranjeria'])) {
            $persona->carnet_extranjeria ="";
            }
            else
                $persona->carnet_extranjeria = $input['carnet_extranjeria'];

            
            if (empty($input['doc_identidad'])) {
                $persona->doc_identidad ="";
            }
            else
                $persona->doc_identidad = $input['doc_identidad'];
            
            $persona->nombre = trim($input['nombre']);
            $persona->ap_paterno = trim($input['ap_paterno']);
            $persona->ap_materno = trim($input['ap_materno']);

            if (empty($input['fecha_nacimiento'])) {
                $persona->fecha_nacimiento ="";            
            }else{
                $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
                $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
            }


            $persona->id_tipo_persona = 3;
            $persona->sexo=$input['sexo'];
            $persona->correo=trim($input['correo']);
            $persona->save();
            $idPersona = $persona->id;

        }

        
        return redirect('tercero/index')->with('stored', 'Se registró a la persona correctamente.');
    }

    public function edit($id){
        $persona = Persona::find($id);
        $carbon=new Carbon();
        if((strtotime($persona['fecha_nacimiento']) < 0))
            $persona->fecha_nacimiento=NULL;
        else
            $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

        return view('admin-persona.persona.tercero.editTercero',compact('persona'));
    }

    public function update(StoreTerceroRequest $request,$id ){
        $carbon=new Carbon(); 
        $input = $request->all();
        $persona = Persona::find($id);
        $persona->nacionalidad = $input['nacionalidad'];

        if (empty($input['carnet_extranjeria'])) {
            $persona->carnet_extranjeria ="";
        }
        else
            $persona->carnet_extranjeria = $input['carnet_extranjeria'];

        
        if (empty($input['doc_identidad'])) {
            $persona->doc_identidad ="";
        }
        else
            $persona->doc_identidad = $input['doc_identidad'];
        
        $persona->nombre = trim($input['nombre']);
        $persona->ap_paterno = trim($input['ap_paterno']);
        $persona->ap_materno = trim($input['ap_materno']);

        if (empty($input['fecha_nacimiento'])) {
            $persona->fecha_nacimiento ="";            
        }else{
            $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);      
            $persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        }


        $persona->id_tipo_persona = 3;
        $persona->sexo=$input['sexo'];
        $persona->correo=trim($input['correo']);
        $persona->save();
            
        return redirect('tercero/index')->with('stored', 'Se modificó la persona correctamente.');
    }

    public function destroy($id){

        $persona = Persona::find($id);
        $persona ->forceDelete();
        return back();

    }
}
