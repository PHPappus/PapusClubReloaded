<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Servicio;
use papusclub\Models\Sede;
use papusclub\Models\TipoPersona;
use papusclub\Models\TarifarioServicio;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StoreServicioRequest;
use papusclub\Http\Requests\EditServicioRequest;
use Log;


class ServiciosController extends Controller
{
    public function index()
    {
        try{

        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $servicios = Servicio::all();
        $mensaje  = null;
        return view('admin-registros.servicio.index', compact('servicios','tiposServicio'));

        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }
    }

    public function create()
    {
        try{
        $sedes_todas = Sede::all();
        $values=Configuracion::where('grupo','=','4')->get();
        $tiposPersonas = TipoPersona::all();
        return view('admin-registros.servicio.newServicio',compact('sedes_todas','values','tiposPersonas'));
        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }
    }

    public function store(StoreServicioRequest $request)
    {
        try {
                    
        $tiposServicio=Configuracion::where('grupo','=','4')->get();
        $tipo_persona = "0";
        $mensaje = 'Se registró el producto correctamente.';
        $input = $request->all();            
        $servicio = new Servicio();        
        $servicio->nombre   = $input['nombre'];
        $servicio->descripcion = $input['descripcion'];
        $servicio->tipo_servicio = $input['tipo_servicio'];
        $servicio->estado = true;           
        $servicio->save();

        $tiposPersonas = TipoPersona::all();
        foreach ($tiposPersonas as $tipPer) {
            $TarifarioServicio = new TarifarioServicio ();
            $TarifarioServicio->idservicio = $servicio->id ;
            $TarifarioServicio->idtipopersona =  $tipPer->id;
            $TarifarioServicio->descripcionparafecha = "Fecha Creada";
            $TarifarioServicio->precio = $input[$tipPer->descripcion];
            $TarifarioServicio->estado = true; 
            $TarifarioServicio->save();            
        }

     /*   $TarifarioServicio = new TarifarioServicio ();
        $TarifarioServicio->idservicio = $servicio->id ;
        $TarifarioServicio->idtipopersona = "1" ;
        $TarifarioServicio->descripcionparafecha = "12";
        $TarifarioServicio->precio = $input['trabajador'];
        $TarifarioServicio->estado = true; 
        $TarifarioServicio->save();

        $TarifarioServicio = new TarifarioServicio ();
        $TarifarioServicio->idservicio = $servicio->id ;
        $TarifarioServicio->idtipopersona = "2" ;
        $TarifarioServicio->descripcionparafecha = "post";
        $TarifarioServicio->precio = $input['postulante'];
        $TarifarioServicio->estado = true; 
        $TarifarioServicio->save();
        
        $TarifarioServicio = new TarifarioServicio ();
        $TarifarioServicio->idservicio = $servicio->id ;
        $TarifarioServicio->idtipopersona = "3" ;
        $TarifarioServicio->descripcionparafecha = "ter";
        $TarifarioServicio->precio = $input['tercero'];
        $TarifarioServicio->estado = true; 
        $TarifarioServicio->save();

   */
                
        return redirect('servicios/index')->with('mensaje', 'Se registró el servicio correctamente.');
        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }

    }

    public function edit($id)
    {
        try{
        $servicio = Servicio::find($id);
        $tiposPersonas = TipoPersona::all();
        $TarifarioServicio = TarifarioServicio::where('idservicio','=',$id)->get();
        $values=Configuracion::where('grupo','=','4')->get();
        $tipoServicio = Configuracion::where('grupo','=','4')->where('id','=',$servicio->tipo_servicio)->first();

        /*foreach ($TarifarioServicio as $s) {
            $s->precio = 1000 ; 
            $s->save();
        }*/
        return view('admin-registros.servicio.editServicio', compact('servicio','TarifarioServicio','tiposPersonas','values','tipoServicio'));
        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }
    }

    public function update(EditServicioRequest $request, $id)
    {
        try{
        $input = $request->all();
        $servicio = Servicio::find($id);
        $servicio->nombre = $input['nombre'];
        $servicio->descripcion = $input['descripcion'];
        $servicio->tipo_servicio = $input['tipo_servicio'];
        $servicio->estado = true;

        if($request['estado']==null){
            $servicio->estado = false;
        }
        else {
            $servicio->estado = true;    
        }

        $servicio->save();
        // return back();cambio 
        $servicios = Servicio::all();


        $TarifarioServicio = TarifarioServicio::where('idservicio','=',$id)->get();
        $tiposPersonas = TipoPersona::all();
        
        foreach ($TarifarioServicio as $s) {
            $tippersona = TipoPersona::where('id','=',$s->idtipopersona)->first();
            $s->precio = $input[$tippersona->id];                              
            $s->save();
        }

        
     
        
        return redirect('servicios/index')->with('mensaje', 'Se actualizó el servicio correctamente.');
        //return view('admin-registros.servicio.prueba',compact('TarifarioServicio','tiposPersonas'));

        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }      
    }


    public function destroy($id)    
    {
        try{
            $servicio = Servicio::find($id);
            if ($servicio->estado == false){
                $servicio->estado = true ;
            }else{
                $servicio->estado = false ;
            }

            $servicio->save();
            return back();

        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }
    }

    public function show($id)
    {
        try{
            $servicio = Servicio::find($id);
            $tiposPersonas = TipoPersona::all();
            $TarifarioServicio = TarifarioServicio::where('idservicio','=',$id)->get();
            $tipoServicios=Configuracion::where('grupo','=','4')->get();
            $tipoServicio = Configuracion::where('grupo','=','4')->where('id','=',$servicio->tipo_servicio)->first();
            return view('admin-registros.servicio.detailServicio', compact('servicio','TarifarioServicio','tiposPersonas','tipoServicio'));
        } catch (\Exception $e) {
          $error = "ServiciosController";
          return view('errors.corrigeme', compact('error'));
        }
    }
}



