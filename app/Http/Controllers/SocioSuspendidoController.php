<?php

namespace papusclub\Http\Controllers;

use Illuminate\Http\Request;

use papusclub\Http\Requests;
use papusclub\Http\Controllers\Controller;
use Log;

class SocioSuspendidoController extends Controller
{
    public function index()
    {	
    	try{
        	return view('socio-suspendido.inicio-al-socio-suspendido');
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $error = 'SocioSuspendidoController-index';
            return view('errors.corrigeme', compact('error'));            
        }   
    }
}
