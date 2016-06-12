<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Http\Requests;
use papusclub\Models\TipoMembresia;
use papusclub\Models\TarifaMembresia;
use papusclub\Http\Requests\StoreMembresiaRequest;
use papusclub\Http\Requests\EditMembresiaRequest;
use Illuminate\Support\Facades\Redirect;

class MembresiaController extends Controller
{
    public function index()
    {
        $membresias = TipoMembresia::all();
        return view('admin-general.membresia.index',compact('membresias'));
    }

    public function indexAll()
    {
        $membresias = TipoMembresia::withTrashed()->get();
        return view('admin-general.membresia.all',compact('membresias'));
    }

    public function create()
    {
    	return view('admin-general.membresia.newMembresia');
    }

    //public function show(TipoMembresia $membresia)
    //{
     //   return view('admin-general.membresia.showMembresia',compact('membresia'));
    //}

    public function show($id)
    {
        $membresia = TipoMembresia::withTrashed()->find($id);
        return view('admin-general.membresia.showMembresia',compact('membresia'));
    }

    public function store(StoreMembresiaRequest $request)
    {
        $input = $request->all();

        $tarifa = new TarifaMembresia();
        $tarifa->monto=$input['tarifa'];
        $tarifa->estado=TRUE;
        $fecha = new DateTime("now");
        $fecha=$fecha->format('Y-m-d');
        $tarifa->fecha_registro=$fecha;

        $tarifa->save();

        $membresia = new TipoMembresia();
        $membresia->descripcion=$input['nombre'];
        $membresia->numMaxInvitados=$input['numMax'];
        $tarifa->addTipo($membresia);

        //return redirect()->action('MembresiaController@index', ['stored' => 'Se registró la sede correctamente.']);
        return redirect('membresia')->with('stored', 'Se registró la sede correctamente.');
    }

    public function edit ($id)
    {
        $membresia = TipoMembresia::withTrashed()->find($id);
        return view('admin-general.membresia.editMembresia',compact('membresia'));
    }

    public function update(EditMembresiaRequest $request, $id)
    {
        $membresia = TipoMembresia::withTrashed()->find($id);
        $input = $request->all();
        
        $membresia->tarifa->update(['monto'=>$input['tarifa']]);

        $membresia->update(['descripcion'=>$input['nombre'],
                            'numMaxInvitados'=>$input['numMax']]);

        return Redirect::action('MembresiaController@index');
    }

    public function destroy(TipoMembresia $membresia)
    {
        if(count($membresia->socio))
        {
            //$membresia->delete(); Se colocaba con softdelete y producía error
            return redirect('membresia')->with('eliminated', 'Imposible de eliminar debido a que existe dependencia a este tipo de membresía, se ha cambiado de estado a inhabilitado');
        }
        else
        {
            $tarifa = $membresia->tarifa;
            $tarifa->forceDelete();
            $membresia->forceDelete();
            return back();
        }
    }

    public function activate($id)
    {
        $membresia = TipoMembresia::withTrashed()->find($id);
        $membresia->restore();
        return back();
    }
}
