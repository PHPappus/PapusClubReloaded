<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use papusclub\Models\Persona;

use papusclub\Http\Requests;
use Carbon\Carbon;
use papusclub\Http\Requests\StoreTerceroRequest;
use papusclub\Http\Requests\EditTerceroRequest;

use Log;

class TerceroController extends Controller
{
    public function index()
    {

        try
        {
            $personas=Persona::where('id_tipo_persona','=','3')->get();
            return view('admin-persona.persona.tercero.index', compact('personas'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-index';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function show($id)
    {

        try
        {
            $persona = Persona::find($id);
            $carbon=new Carbon();
            if((strtotime($persona['fecha_nacimiento']) < 0))
                $persona->fecha_nacimiento=NULL;
            else
                $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

            return view('admin-persona.persona.tercero.detailTercero',compact('persona'));          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-show';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function registrar()
    {
        try
        {
            return view('admin-persona.persona.tercero.newTercero');         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-registrar';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function store(StoreTerceroRequest $request)
    {

        try
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
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-store';
            return view('errors.corrigeme', compact('error'));            
        }         


    }

    public function edit($id)
    {

        try
        {
            $persona = Persona::find($id);
            $carbon=new Carbon();
            if((strtotime($persona['fecha_nacimiento']) < 0))
                $persona->fecha_nacimiento=NULL;
            else
                $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

            return view('admin-persona.persona.tercero.editTercero',compact('persona'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-registrar';
            return view('errors.corrigeme', compact('error'));            
        }  


    }

    public function update(EditTerceroRequest $request,$id )
    {

        try
        {
            $carbon=new Carbon(); 
            $input = $request->all();
            $persona = Persona::find($id);
            
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
            $persona->save();
                
            return redirect('tercero/index')->with('stored', 'Se modificó la persona correctamente.');         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-update';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function destroy($id)
    {


        try
        {
            $persona = Persona::find($id);
            $persona ->forceDelete();
            return back();        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TerceroController-destroy';
            return view('errors.corrigeme', compact('error'));            
        }         



    }
}
