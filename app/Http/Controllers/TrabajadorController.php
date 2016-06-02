<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Persona;
use papusclub\Models\Trabajador;
use papusclub\Http\Requests\StoreTrabajadorRequest;

use papusclub\Models\Configuracion;

use Carbon\Carbon;

class TrabajadorController extends Controller
{

    public function index()
    {
        return view('admin-general.persona.trabajador.index', compact('puestos'));
    }

    public function buscar()
    {
        return view('admin-general.persona.trabajador.buscar-trabajador');
    }

    public function registrar()
    {
        $puestos = Configuracion::all()->where('grupo', 1);
        return view('admin-general.persona.trabajador.newTrabajador',compact('puestos'));
    }


    public function store(StoreTrabajadorRequest $request)
    {       
        $input = $request->all();
        $persona = new Persona();
        $carbon=new Carbon(); 

        $persona->nacionalidad = $input['nacionalidad'];

        if ($input['carnet_extranjeria']='') {
            $persona->doc_identidad ="";
        }
        else
            $persona->doc_identidad = $input['doc_identidad'];

        
        if ($input['carnet_extranjeria']='') {
            $persona->carnet_extranjeria ="";
        }
        else
            $persona->carnet_extranjeria = $input['carnet_extranjeria'];
        
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
        $persona->sexo=$input['sex'];

        $persona->save();
        $idPersona = $persona->id; //obtiene el id de la persona ingresada
        //Aqui hago el registro del trabajador una vez registraa la persona

        $trabajador=new Trabajador();
        $trabajador->id=$idPersona;
        $trabajador->puesto=$input['puestoSelect'];

/*
        if ($input['fecha_ini_contrato']='') {
            $trabajador->fecha_ini_contrato="";
        }else{
            $fecha_ini_contrato = str_replace('/', '-', $input['fecha_ini_contrato']);      
            $trabajador->fecha_ini_contrato=$carbon->createFromFormat('d-m-Y', $fecha_ini_contrato)->toDateString();
        }

        if ($input['fecha_fin_contrato']='') {
            $trabajador->fecha_fin_contrato="";
        }else{
            $fecha_fin_contrato = str_replace('/', '-', $input['fecha_fin_contrato']);      
            $trabajador->fecha_fin_contrato=$carbon->createFromFormat('d-m-Y', $fecha_fin_contrato)->toDateString();
        }*/

        $trabajador->save();

        
        //$persona->id_usuario = $input['id_usuario'];     
        
        
        return redirect('trabajador/search')->with('stored', 'Se registró el producto correctamente.');
    }
}
