<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Servicio;
use papusclub\Models\Sede;
use papusclub\Http\Requests\StoreServicioRequest;
use papusclub\Http\Requests\EditServicioRequest;


class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        $mensaje  = null;
        return view('admin-general.servicio.index', compact('servicios'));
    }

    public function create()
    {
        $sedes_todas = Sede::all();
        return view('admin-general.servicio.newServicio',compact('sedes_todas'));
    }

    public function store(StoreServicioRequest $request)
    {
        $mensaje = 'Se registró el producto correctamente.';
        $input = $request->all();            
        $servicio = new Servicio();
        $servicio->nombre = $input['nombre'];
        $servicio->descripcion = $input['descripcion'];
        $servicio->tipo_servicio = $input['tipo_servicio'];
        $servicio->estado = true;                
        $servicio->save();
        return redirect('servicios/index')->with('mensaje', 'Se registró el servicio correctamente.');
    }

    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('admin-general.servicio.editServicio', compact('servicio'));
    }

    public function update(EditServicioRequest $request, $id)
    {
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
        
        return redirect('servicios/index')->with('mensaje', 'Se actualizó el servicio correctamente.');
                  
    }


    public function destroy($id)    
    {
        $servicio = Servicio::find($id);
        if ($servicio->estado == false){
            $servicio->estado = true ;
        }else{
            $servicio->estado = false ;
        }

        $servicio->save();
        return back();
    }

    public function show($id)
    {
        $servicio = Servicio::find($id);
        return view('admin-general.servicio.detailServicio', compact('servicio'));
    }
}


