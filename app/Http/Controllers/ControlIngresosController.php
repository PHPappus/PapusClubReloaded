<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use papusclub\Http\Requests\BuscarPersonalRequest;
use papusclub\Http\Requests\BuscarTerceroRequest;
use papusclub\Http\Requests\BuscarSocioRequest;

use papusclub\Models\Sede;
use papusclub\Models\Persona;
use papusclub\Models\Configuracion;
use papusclub\Models\Carnet;
use papusclub\Models\HistoricoIngreso;
use papusclub\Models\HistoricoInvitacion;
use Session;
use DateTime;
use DB;

use Log;

class ControlIngresosController extends Controller
{
    public function index()
    {
        try
        {
            return view('control-ingresos.inicio-al-control-ingresos');         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-index';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function indexpersonal()
    {
        try
        {
            $sedes=Sede::all();
            return view('control-ingresos.personal.index',compact('sedes'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-indexpersonal';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function buscarpersonal(BuscarPersonalRequest $request)
    {
        try
        {
            $input = $request->all();

            $sede_id = $input['sede'];
            $documento = $input['documento'];
            $numerodoc=$input['numerodoc'];
            $sedes=Sede::all();

            $persona=null;
            if($documento == 'DNI')
            {
                $match = ['id_tipo_persona'=>1,'doc_identidad'=>$numerodoc];
                $persona = Persona::where($match)->first(); 
            }
            else
            {
                $match = ['id_tipo_persona'=>1,'carnet_extranjeria'=>$numerodoc];
                $persona = Persona::where($match)->first();
            }

            if($persona!=null)
            {
                $puesto_id = $persona->trabajador->puesto;
                $puesto = Configuracion::find($puesto_id);
                $persona->trabajador->puesto=$puesto->valor;
                Session::flash('resultado','encontrado');
            }
            else
            {
                Session::flash('resultado','noencontrado');
            }
            return view('control-ingresos.personal.marcaringreso',compact('sedes','sede_id','persona'));      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-buscarpersonal';
            return view('errors.corrigeme', compact('error'));            
        }         

    }

    public function ingresopersonal(Request $request)
    {
        try
        {
            $input = $request->all();
            $persona_id = $input['persona_id'];
            $sede_id = $input['sede_id'];


            DB::beginTransaction();

            //DB::table('users')->where('votes', '>', 100)->lockForUpdate()->get();
            $sede = Sede::find($sede_id)->lockForUpdate()->first();
            if($sede->maximo_actual>0)
            {
                $sede->maximo_actual--;
                $sede->save();
                $historicoingreso = new HistoricoIngreso();
                $historicoingreso->persona_id = $persona_id;
                $historicoingreso->sede_id = $sede_id;

                $fecha = new DateTime("now");
                $fecha=$fecha->format('Y-m-d');
                $historicoingreso->fecha = $fecha;

                $historicoingreso->save();          
            }
            else
            {
                Session::flash('resultado','abortar');
                return view('control-ingresos.personal.respuesta');         
            }

            DB::commit();

            Session::flash('resultado','aceptar');
            return view('control-ingresos.personal.respuesta');      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-ingresopersonal';
            return view('errors.corrigeme', compact('error'));            
        }

    }



    public function indextercero()
    {
        try
        {
            $sedes=Sede::all();
            return view('control-ingresos.terceros.index',compact('sedes'));       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-indextercero';
            return view('errors.corrigeme', compact('error'));            
        }        
     
    }

    public function buscartercero(BuscarTerceroRequest $request)
    {
        try
        {
            $input = $request->all();

            $sede_id = $input['sede'];
            $documento = $input['documento'];
            $numerodoc=$input['numerodoc'];
            $sedes=Sede::all();



            $persona=null;
            if($documento == 'DNI')
            {
                $match = ['id_tipo_persona'=>3,'doc_identidad'=>$numerodoc];
                $persona = Persona::where($match)->first();
            }
            else
            {
                $match = ['id_tipo_persona'=>3,'carnet_extranjeria'=>$numerodoc];
                $persona = Persona::where($match)->first();
            }

            if($persona==null)
            {
                Session::flash('resultado','noencontrado');
            }
            else
            {
                Session::flash('resultado','encontrado');
            }

            return view('control-ingresos.terceros.marcaringreso',compact('sedes','sede_id','persona'));       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-buscartercero';
            return view('errors.corrigeme', compact('error'));            
        }         
               
    }

    public function ingresotercero(Request $request)
    {
        try
        {
            $input = $request->all();
            $persona_id = $input['persona_id'];
            $sede_id = $input['sede_id'];
            $config = Configuracion::where('grupo','=',12)->first();
            $precio_entrada =$config->valor;
            $fecha = new DateTime("now");
            $fecha_2 = $fecha->format('d-m-Y H:i:s');
            $fecha=$fecha->format('Y-m-d H:i:s');

            DB::beginTransaction();

            //DB::table('users')->where('votes', '>', 100)->lockForUpdate()->get();
            $sede = Sede::find($sede_id)->lockForUpdate()->first();
            if($sede->maximo_actual>0)
            {
                $sede->maximo_actual--;
                $sede->save();
                $historicoingreso = new HistoricoIngreso();
                $historicoingreso->persona_id = $persona_id;
                $historicoingreso->sede_id = $sede_id;


                $historicoingreso->fecha = $fecha;

                $historicoingreso->save();          
            }
            else
            {
                Session::flash('resultado','abortar');
                return view('control-ingresos.terceros.respuesta');         
            }

            DB::commit();

            Session::flash('resultado','aceptar');
            $persona = Persona::find($persona_id);
            $sede = Sede::find($sede_id);
            return view('control-ingresos.terceros.respuesta',compact('persona','sede','precio_entrada','fecha_2'));       
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-ingresotercero';
            return view('errors.corrigeme', compact('error'));            
        }         
                
    }

    public function indexsocio()
    {
        try
        {
            $sedes=Sede::all();
            return view('control-ingresos.socio.index',compact('sedes'));                   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-indexsocio';
            return view('errors.corrigeme', compact('error'));            
        }        
       
    }

    public function buscarsocio(BuscarSocioRequest $request)
    {
        try
        {
            $input = $request->all();

            $sede_id = $input['sede'];
            $nro_carnet = $input['numero_carnet'];
            $sedes=Sede::all();

            $fecha = new DateTime("now");
            $dia = $fecha->format('d');

            $carnet = Carnet::where('nro_carnet','=',$nro_carnet)->get()->first();

            $config = Configuracion::where('grupo','=',12)->first();
            $precio_entrada =$config->valor;

            $historicoinvitaciones = HistoricoInvitacion::where('sede_id','=',$sede_id)->whereDay('fecha_invitacion','=',date($dia))->get(); //obtener todas las invitaciones del día


            if($carnet!=null)
            {
                Session::flash('resultado','encontrado');
                $socio = $carnet->socio;

                //obtener lista de invitados del socio para ese día
                $invitados = array();
                foreach ($historicoinvitaciones as $historicoinvitacion ) {
                    if($historicoinvitacion->invitado->persona_id == $socio->postulante->persona->id)
                    {
                        $persona = Persona::find($historicoinvitacion->invitado->invitado_id); //obtengo un invitado de ese socio
                        array_push($invitados,$persona);
                    }
                }

                

                return view('control-ingresos.socio.marcaringreso',compact('sede_id','socio','invitados','precio_entrada')); 
            }
            else
            {
                Session::flash('resultado','noencontrado');
                return view('control-ingresos.socio.marcaringreso');
            }                   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-buscarsocio';
            return view('errors.corrigeme', compact('error'));            
        }         
             
    }

    public function ingresosocio(Request $request)
    {
        try
        {
            $input = $request->all();

            //obtener socio
            $nro_carnet = $input['carnet'];
            $carnet = Carnet::where('nro_carnet','=',$nro_carnet)->get()->first();
            $socio = $carnet->socio;

            //obtener sede
            $sede_id = $input['sede_id'];
            //$sede = Sede::find($sede_id);                

            //obtener familiares
            $fam_ids=array();
            if(isset($input['fam']))
            {
                $fam_ids = $input['fam'];
            }

            //obtener invitados
            $inv_ids=array();
            if(isset($input['inv']))
            {
                $inv_ids=$input['inv'];
            }

            //fecha ingreso
            $fecha = new DateTime("now");
            $fecha_2 = $fecha->format('d-m-Y H:i:s');
            $fecha=$fecha->format('Y-m-d H:i:s');

            //precio entrada
            $config = Configuracion::where('grupo','=',12)->first();
            $precio_entrada =$config->valor;  


            //numero de ingresantes = socio+familiares+invitados
            $tot=1+count($fam_ids)+count($inv_ids);

            //transaccional
            DB::beginTransaction();
            $sede = Sede::find($sede_id)->lockForUpdate()->first();
            if($sede->maximo_actual>$tot)
            {
                $sede->maximo_actual=$sede->maximo_actual-$tot;
                $sede->save();

                //guardar socio
                $historico = new HistoricoIngreso();
                $historico->persona_id = $socio->postulante->persona->id;
                $historico->sede_id = $sede_id;
                $historico->fecha=$fecha;
                $historico->save();

                //guardar familiares
                foreach ($fam_ids as $persona_id) {
                    $historicoingreso = new HistoricoIngreso();
                    $historicoingreso->persona_id = $persona_id;
                    $historicoingreso->sede_id = $sede_id;
                    $historico->fecha=$fecha;
                    $historico->save();                
                }

                //guardar invitados
                foreach ($inv_ids as $persona_id) {
                    $historicoingreso = new HistoricoIngreso();
                    $historicoingreso->persona_id = $persona_id;
                    $historicoingreso->sede_id = $sede_id;
                    $historico->fecha=$fecha;
                    $historico->save();  
                }
            }
            else
            {
                Session::flash('resultado','abortar');
                return view('control-ingresos.socio.respuesta');               
            }        

            DB::commit();

            Session::flash('resultado','aceptar');
            $sede = Sede::find($sede_id);
            $numFam = count($fam_ids);
            $numInv = count($inv_ids);

            $precio_tot=0;
            if($socio->numInvitadosMes==$socio->membresia->numMaxInvitados)
            {   
                $precio_tot=$precio_entrada*$numInv;
            }
            elseif ($socio->numInvitadosMes+$tot>=$socio->membresia->numMaxInvitados) {
                $dif = $socio->numInvitadosMes+$numInv -$socio->membresia->numMaxInvitados;
                $precio_tot=$precio_entrada*$dif;
                $socio->numInvitadosMes=$socio->membresia->numMaxInvitados;
                $socio->save();
            }
            else
            {
                $socio->numInvitadosMes=$socio->numInvitadosMes+$numInv;
                $socio->save();
            }
            return view('control-ingresos.socio.respuesta',compact('socio','sede','numFam','numInv','precio_tot','fecha_2'));                   
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'ControlIngresosController-ingresosocio';
            return view('errors.corrigeme', compact('error'));            
        }            
                           
    }
}
