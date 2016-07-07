    <?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Models\Promocion;
use papusclub\Models\Configuracion;
use papusclub\Http\Requests\StorePromocionRequest;
use papusclub\Http\Requests\EditPromocionRequest;
use Log;

use Carbon\Carbon;
class PromocionesController extends Controller
{
    
    public function index() {

        try
        {
            $promociones = Promocion::all();
            return view('admin-registros.promocion.index', compact('promociones'));         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
    }   

    public function create()
    {
        try
        {
            
            $tipos = Configuracion::where('grupo','=',15)->get();
           return view('admin-registros.promocion.newPromocion',compact('tipos'));          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
    }
    
    public function store(StorePromocionRequest $request)
    {       
        try
        {
            $input = $request->all();
            $promocion = new Promocion();
            $promocion->estado                = TRUE;
            $promocion->descripcion           = $input['descripcion'];
            $promocion->porcentajeDescuento   = $input['porcentajeDescuento'];
            $promocion->tipo                  = $input['tipoPromo'];


            
            $promocion->save();         
            return redirect('promociones/index')->with('stored', 'Se registró la promocion correctamente.');          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
        
    }
    
    
    public function edit($id)
    {
        try
        {
            $tipos = Configuracion::where('grupo','=',15)->get();
            $promocion = Promocion::find($id);
            return view('admin-registros.promocion.editPromocion', compact('promocion','tipos'));          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
    }

    public function update(StorePromocionRequest $request, $id)
    {
        try
        {
            $input = $request->all();
            $promocion = Promocion::find($id);
            $promocion->descripcion           = $input['descripcion'];
            $promocion->porcentajeDescuento   = $input['porcentajeDescuento'];
            $promocion->tipo                  = $input['tipoPromo'];

            if (isset($input['estado']))
            {
                $promocion->estado = TRUE;
            }
            else
            {
                $promocion->estado = FALSE;
            }

            
            $promocion->save();         
            return redirect('promociones/index')->with('stored', 'Se modifico la promocion correctamente.');         
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        

    }

    public function destroy($id)    
    {
        try
        {
            $promocion = Promocion::find($id);
            $promocion->delete();
            return back();      
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
    }

    public function show($id)
    {
        try
        {
            $promocion = Promocion::find($id);
            return view('admin-registros.promocion.detailPromocion', compact('promocion'));          
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioAdminController-index';
            return view('errors.corrigeme', compact('error'));            
        } 

        
    }

}
