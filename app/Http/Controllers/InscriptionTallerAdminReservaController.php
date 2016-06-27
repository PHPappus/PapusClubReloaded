<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

use papusclub\Http\Requests\MakeInscriptionToUserRequest;

use Session;
use Redirect;

use papusclub\Models\Taller;
use papusclub\Models\Sede;
use papusclub\User;
use papusclub\Models\Persona;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\Promocion;
use papusclub\Models\Postulante;
use Auth;
use Hash;
use Carbon\Carbon;
use Exception;
use DB;

class InscriptionTallerAdminReservaController extends Controller
{
    public function index()
    {
        $talleres=Taller::where('fecha_inicio_inscripciones','<=',Carbon::now('America/Lima')->format('Y-m-d'))->where('fecha_fin_inscripciones','>=',Carbon::now('America/Lima')->format('Y-m-d'))->get();
        
        $sedes          = Sede::all();
        $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');

        return view('admin-reserva.talleres.index',compact('sedes','talleres','fecha_inicio'));
    }

    public function confirmInscription($id)
    {
        
        $taller   = Taller::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();

        $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                             ->get();

        return view('admin-reserva.talleres.confirmacion-inscripcion', compact('taller', 'tipo_comprobantes','personas'));

    }
}
