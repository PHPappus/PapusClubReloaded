<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use papusclub\Http\Requests;
use papusclub\Models\TipoMembresia;
use papusclub\Models\TarifaMembresia;
use papusclub\Models\TipoFamilia;
use papusclub\Http\Requests\StoreMembresiaRequest;
use papusclub\Http\Requests\EditMembresiaRequest;
use Illuminate\Support\Facades\Redirect;

use Log;

class MembresiaController extends Controller
{
    public function index()
    {
        try
        {
            $membresias = TipoMembresia::all();
            return view('admin-general.membresia.index',compact('membresias'));            
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-index';
            return view('errors.corrigeme', compact('error'));            
        }

    }

    public function indexAll()
    {
        try
        {
            $membresias = TipoMembresia::withTrashed()->get();
            return view('admin-general.membresia.all',compact('membresias'));            
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-indexAll';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function create()
    {
        try
        {
            $tipofamilias=TipoFamilia::all();
            return view('admin-general.membresia.newMembresia',compact('tipofamilias'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-create';
            return view('errors.corrigeme', compact('error'));            
        }         

    }


    public function show($id)
    {
        try
        {
            $membresia = TipoMembresia::withTrashed()->find($id);
            return view('admin-general.membresia.showMembresia',compact('membresia'));           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-show';
            return view('errors.corrigeme', compact('error'));            
        }          

    }

    public function store(StoreMembresiaRequest $request)
    {

        try
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

            /*$descuentos_familiares = $input['descuentos'];

            foreach($descuentos_familiares as $key =>$val)
            {
                $tipofamilia = TipoFamilia::find($key);
                $membresia->add_tarifaFamilia($tipofamilia,$val,$fecha);
            }*/
     
            return redirect('membresia')->with('stored', 'Se registró la membresía correctamente.');           
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-store';
            return view('errors.corrigeme', compact('error'));            
        }


    }

    public function edit ($id)
    {
        try
        {
            $membresia = TipoMembresia::withTrashed()->find($id);
            return view('admin-general.membresia.editMembresia',compact('membresia'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-edit';
            return view('errors.corrigeme', compact('error'));            
        }        

    }

    public function update(EditMembresiaRequest $request, $id)
    {
        try
        {
            $membresia = TipoMembresia::withTrashed()->find($id);
            $input = $request->all();
            
            $membresia->tarifa->update(['monto'=>$input['tarifa']]);

            $membresia->update(['descripcion'=>$input['nombre'],
                                'numMaxInvitados'=>$input['numMax']]);    

            return Redirect::action('MembresiaController@index')->with('stored','Se actualizo la membresía correctamente');        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-update';
            return view('errors.corrigeme', compact('error'));            
        } 

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
            try
            {
                $tarifa = $membresia->tarifa;
                $membresia->forceDelete();
                $tarifa->forceDelete();             
            }
            catch(\Exception $e)
            {
                Log::error($e);
                $error = 'MembresiaController-destroy';
                return view('errors.corrigeme', compact('error'));  
            }
            return back();
        }
    }

    public function activate($id)
    {

        try
        {
            $membresia = TipoMembresia::withTrashed()->find($id);
            $membresia->restore();
            return back();        
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'MembresiaController-activate';
            return view('errors.corrigeme', compact('error'));            
        }         

    }
}
