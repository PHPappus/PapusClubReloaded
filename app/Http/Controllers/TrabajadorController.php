<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Persona;
use papusclub\Models\Trabajador;
use papusclub\Models\Sede;
use papusclub\Http\Requests\StoreTrabajadorRequest;
use papusclub\Http\Requests\EditTrabajadorRequest;

use papusclub\Models\Configuracion;

use Carbon\Carbon;
use Log;

class TrabajadorController extends Controller
{

    public function index()
    {

        try
        {
            $personas=Persona::where('id_tipo_persona','=','1')->get();
            return view('admin-persona.persona.trabajador.index', compact('personas'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-index';
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

            $trabajador=Trabajador::find($persona->id);

            if((strtotime($trabajador['fecha_ini_contrato']) < 0)) 
                $trabajador->fecha_ini_contrato=NULL;
            else
                $trabajador->fecha_ini_contrato=$carbon->createFromFormat('Y-m-d',  $trabajador->fecha_ini_contrato)->format('d/m/Y');
            
            if((strtotime($trabajador['fecha_fin_contrato']) < 0)) 
                $trabajador->fecha_fin_contrato=NULL;
            else
                $trabajador->fecha_fin_contrato=$carbon->createFromFormat('Y-m-d',  $trabajador->fecha_fin_contrato)->format('d/m/Y');

            $puesto=Configuracion::find($trabajador->puesto);
    /*      $idpuesto=$trabajador->puesto;
            $puesto=Configuracion::find('2');*/
            return view('admin-persona.persona.trabajador.detailTrabajador',compact('persona', 'trabajador','puesto'));          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-index';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function registrar()
    {

        try
        {
            $puestos = Configuracion::where('grupo','=','1')->get();
            $sedes= Sede::all();
            return view('admin-persona.persona.trabajador.newTrabajador',compact('puestos','sedes'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-registrar';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function store(StoreTrabajadorRequest $request)
    {

        try
        {
            $input = $request->all();
            $persona = new Persona();
            $carbon=new Carbon(); 

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


            $persona->id_tipo_persona = 1;
            $persona->sexo=$input['sexo'];
            $persona->correo=trim($input['correo']);
            $persona->save();
            $idPersona = $persona->id; //obtiene el id de la persona ingresada
            //Aqui hago el registro del trabajador una vez registraa la persona

            $trabajador=new Trabajador();
            $trabajador->id=$idPersona;
            $trabajador->puesto=$input['puestoSelect'];

            $trabajador->sede=$input['sedeSelect'];

            if (empty($input['fecha_ini_contrato'])) {
                $trabajador->fecha_ini_contrato="";
            }else{
                $fecha_ini_contrato = str_replace('/', '-', $input['fecha_ini_contrato']);      
                $trabajador->fecha_ini_contrato=$carbon->createFromFormat('d-m-Y', $fecha_ini_contrato)->toDateString();
            }

            if (empty($input['fecha_fin_contrato'])) {
                $trabajador->fecha_fin_contrato="";
            }else{
                $fecha_fin_contrato = str_replace('/', '-', $input['fecha_fin_contrato']);      
                $trabajador->fecha_fin_contrato=$carbon->createFromFormat('d-m-Y', $fecha_fin_contrato)->toDateString();
            }


            $trabajador->save();

            
            //$persona->id_usuario = $input['id_usuario'];     
            
            
            return redirect('trabajador/index')->with('stored', 'Se registró el producto correctamente.');           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-store';
            return view('errors.corrigeme', compact('error'));            
        }            

    }

    public function edit($id)
    {

        try
        {
            $puestoslaborales = Configuracion::where('grupo','=','1')->get();
            $persona = Persona::find($id);
            $carbon=new Carbon();
            if((strtotime($persona['fecha_nacimiento']) < 0))
                $persona->fecha_nacimiento=NULL;
            else
                $persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d', $persona->fecha_nacimiento)->format('d/m/Y');

            $trabajador=Trabajador::find($persona->id);

            if((strtotime($trabajador['fecha_ini_contrato']) < 0)) 
                $trabajador->fecha_ini_contrato=NULL;
            else
                $trabajador->fecha_ini_contrato=$carbon->createFromFormat('Y-m-d',  $trabajador->fecha_ini_contrato)->format('d/m/Y');
            
            if((strtotime($trabajador['fecha_fin_contrato']) < 0)) 
                $trabajador->fecha_fin_contrato=NULL;
            else
                $trabajador->fecha_fin_contrato=$carbon->createFromFormat('Y-m-d',  $trabajador->fecha_fin_contrato)->format('d/m/Y');

            $puesto=Configuracion::find($trabajador->puesto);
            $sedes= Sede::all();

            return view('admin-persona.persona.trabajador.editTrabajador',compact('persona', 'trabajador','puesto','puestoslaborales','sedes'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-edit';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function update(EditTrabajadorRequest $request,$id )
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


            $persona->id_tipo_persona = 1;
            if (empty($input['sexo'])) {
                 $persona->sexo="";
            }else{
                $persona->sexo=$input['sexo'];
            }
            $persona->save();

            $trabajador=Trabajador::find($persona->id);
            $trabajador->puesto=$input['puestoSelect'];

            $trabajador->sede=$input['sedeSelect'];


            if (empty($input['fecha_ini_contrato'])) {
                $trabajador->fecha_ini_contrato="";
            }else{
                $fecha_ini_contrato = str_replace('/', '-', $input['fecha_ini_contrato']);      
                $trabajador->fecha_ini_contrato=$carbon->createFromFormat('d-m-Y', $fecha_ini_contrato)->toDateString();
            }

            if (empty($input['fecha_fin_contrato'])) {
                $trabajador->fecha_fin_contrato="";
            }else{
                $fecha_fin_contrato = str_replace('/', '-', $input['fecha_fin_contrato']);      
                $trabajador->fecha_fin_contrato=$carbon->createFromFormat('d-m-Y', $fecha_fin_contrato)->toDateString();
            }


            $trabajador->save();
                
            return redirect('trabajador/index')->with('stored', 'Se modificó el trabajador correctamente.');           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-update';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function destroy($id)
    {

        try
        {
            $persona = Persona::find($id);
            $trabajador=Trabajador::find($persona->id);


            $trabajador->forceDelete();
            $persona ->forceDelete();
            return back();          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'TrabajadorController-registrar';
            return view('errors.corrigeme', compact('error'));            
        }         

    }
}
