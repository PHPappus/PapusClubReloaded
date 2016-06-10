<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateInterval;
use Carbon\Carbon;
use papusclub\Http\Requests;
use papusclub\Models\Socio;
use papusclub\Models\Carnet;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\EditSocioBasicoRequest;
use papusclub\Http\Requests\EditSocioEstudioRequest;
use papusclub\Http\Requests\EditSocioTrabajoRequest;
use papusclub\Http\Requests\EditSocioContactoRequest;
use Illuminate\Support\Facades\Redirect;
use Session;

class SocioAdminController extends Controller
{
    public function index()
    {
        $socios = Socio::all();
        
        return view('admin-general.persona.socio.index',compact('socios'));
    }

    public function indexAll()
    {
        $socios = Socio::withTrashed()->get();
        return view('admin-general.persona.socio.all',compact('socios'));
    }

    public function show($id)
    {
        $socio = Socio::withTrashed()->find($id);
        $carbon=new Carbon();
        $socio->carnet_actual()->fecha_emision=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_emision)->format('d/m/Y');
        $socio->carnet_actual()->fecha_vencimiento=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_vencimiento)->format('d/m/Y');
        $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d',$socio->postulante->persona->fecha_nacimiento)->format('d/m/Y');
        return view('admin-general.persona.socio.showSocio',compact('socio'));
    }

    public function destroy(Socio $socio)
    {
        if(!($socio->isIndependent()))
        {
            $socio->update(['estado'=>false]);
            $socio->delete();
            return redirect('Socio')->with('eliminated', 'Imposible de eliminar existe dependencia, se ha cambiado de estado a inhabilitado');
        }
        else
        {
            $socio->forceDelete();
            return back();
        }
    }

    public function activate($id)
    {
        $socio = Socio::withTrashed()->find($id);
        $socio->restore();
        if(strcmp($socio->estado(),$socio->inhabilitado())!=0) // carnet vencido o carnet inhabilitado
        {
            /*Registro de un nuevo carnet*/
            $anio = Configuracion::where('grupo',5)->first();
            $tempcarnet = $socio->carnet_actual();
            $carnet = new Carnet();
            $carnet->nro_carnet = $tempcarnet->nro_carnet;
            /*Fecha de emision*/
            $fecha_emision = new DateTime("now");
            $fecha_vencimiento = $fecha_emision;
            $fecha_emision=$fecha_emision->format('Y-m-d');
            $carnet->fecha_emision = $fecha_emision;
            /*Fecha de vencimiento*/
            $intervalo = new DateInterval('P'.$anio->valor.'Y');
            $fecha_vencimiento->add($intervalo);
            $fecha_vencimiento=$fecha_vencimiento->format('Y-m-d');
            $carnet->fecha_vencimiento = $fecha_vencimiento;
            $socio->addCarnet($carnet);
        }
        $socio->update(['estado'=>true]);
        return back();
    }

    public function edit($id)
    {
        $socio = Socio::withTrashed()->find($id);
        $carbon=new Carbon();
        $socio->carnet_actual()->fecha_emision=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_emision)->format('d/m/Y');
        $socio->carnet_actual()->fecha_vencimiento=$carbon->createFromFormat('Y-m-d',$socio->carnet_actual()->fecha_vencimiento)->format('d/m/Y');
        $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('Y-m-d',$socio->postulante->persona->fecha_nacimiento)->format('d/m/Y');
        return view('admin-general.persona.socio.editSocio',compact('socio'));        
    }

    public function updateBasico(EditSocioBasicoRequest $request,$id)
    {
        $carbon = new Carbon();

        $socio = Socio::withTrashed()->find($id);
        $input=$request->all();
        $nombre = trim($input['nombre']);
        $fecha_nac = str_replace('/', '-', $input['fecha_nacimiento']);
        $socio->postulante->persona->fecha_nacimiento=$carbon->createFromFormat('d-m-Y', $fecha_nac)->toDateString();
        $socio->postulante->persona->nombre=$nombre;
        $socio->postulante->persona->save();

        //$socio->postulante->persona->update(['nombre'=>$input['nombre'], 'fecha_nacimiento'=>$fecha_nac]);
        //return view('admin-general.persona.socio.editSocio',compact('socio'));
        Session::flash('update','basico');  
        return Redirect::action('SocioAdminController@edit',$socio->id); 
    }

    public function updateEstudio(EditSocioEstudioRequest $request, $id)
    {
        $socio = Socio::withTrashed()->find($id);
        $input=$request->all();
        $primaria = trim($input['colegio_primaria']);
        $secundaria = trim($input['colegio_secundaria']);
        $socio->postulante->colegio_primario=$primaria;
        $socio->postulante->colegio_secundario=$secundaria;
        /*Campos opcionales*/
        if(!empty($input['universidad']))
        {
            $universidad=trim($input['universidad']);
            $socio->postulante->universidad=$universidad;
        }
        if(!empty($input['carrera']))
        {
            $carrera=trim($input['carrera']);
            $socio->postulante->profesion=$carrera;
        }
        $socio->postulante->save();
        Session::flash('update','estudio');
        return Redirect::action('SocioAdminController@edit',$socio->id);
    }

    public function updateTrabajo(EditSocioTrabajoRequest $request,$id)
    {
        $socio = Socio::withTrashed()->find($id);
        $input=$request->all();
        /*Campos opcionales*/
        if(!empty($input['centrotrabajo']))
        {
            $centrotrabajo=trim($input['centrotrabajo']);
            $socio->postulante->centro_trabajo=$centrotrabajo;
        }
        if(!empty($input['cargocentrotrabajo']))
        {
            $cargocentrotrabajo=trim($input['cargocentrotrabajo']);
            $socio->postulante->cargo_centro_trabajo=$cargocentrotrabajo;
        }
        if(!empty($input['direccionlaboral']))
        {
            $direccionlaboral=trim($input['direccionlaboral']);
            $socio->postulante->direccionLaboral=$direccionlaboral;
        }
        $socio->postulante->save();
        Session::flash('update','trabajo');
        return Redirect::action('SocioAdminController@edit',$socio->id);                                        
    }

    public function updateContacto(EditSocioContactoRequest $request,$id)
    {
        $socio = Socio::withTrashed()->find($id);
        $input=$request->all();

        $telefono = trim($input['telefono_domicilio']);
        $celular = trim($input['telefono_celular']);
        $correo = trim($input['correo']);

        $socio->postulante->telefono_domicilio=$telefono;
        $socio->postulante->telefono_celular=$celular;
        $socio->postulante->persona->correo=$correo;

        $socio->postulante->persona->save();
        $socio->postulante->save();

        Session::flash('update','contacto');
        return Redirect::action('SocioAdminController@edit',$socio->id);        
    }
}
