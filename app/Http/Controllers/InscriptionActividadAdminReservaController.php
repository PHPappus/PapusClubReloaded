<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;

use Auth;
use Session;
use Hash;
use papusclub\Models\Ambiente;
use papusclub\Models\Actividad;
use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\Models\Configuracion;
use papusclub\Models\Facturacion;
use papusclub\Models\Postulante;
use Carbon\Carbon;
use DB;

class InscriptionActividadAdminReservaController extends Controller
{
    //Muestra la pantalla para realizar la inscirpcion de la actividad
    public function inscriptionActividadAdminReserva()
    {
        $sedes = Sede::all();

        $fecha_inicio   = Carbon::now('America/Lima')->format('Y-m-d');   
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('Y-m-d');   

        /*Filtrar las actividades que estan disponibles (>= que la fecha actual) y con estado 1 */
        $actividades=Actividad::where('estado','=',1)->where('a_realizarse_en','>=',Carbon::now('America/Lima')->format('Y-m-d'))
                                ->where('a_realizarse_en','>=',$fecha_inicio)
                               ->where('a_realizarse_en','<=',$fecha_fin)
                               ->get();
        
        $fecha_inicio   = Carbon::now('America/Lima')->format('d-m-Y');
        $fecha_inicio=str_replace('-', '/', $fecha_inicio);
        $fecha_fin = Carbon::now('America/Lima')->addMonths(4)->format('d-m-Y');
        $fecha_fin=str_replace('-', '/', $fecha_fin);

        return view('admin-reserva.actividades.inscripcion', compact('sedes','actividades','fecha_inicio','fecha_fin'));
    }

    public function storeInscriptionActividadAdminReserva($id)
    {
        $actividad=Actividad::find($id);
        $tipo_comprobantes = Configuracion::where('grupo','=','10')->get();
        $personas = Persona::where('id_usuario','!=',null)->where('id_tipo_persona','=',2)//Socios
                             ->get();

        return view('admin-reserva.actividades.confirmacion-inscripcion',compact('actividad', 'tipo_comprobantes','personas'));
    }
}
