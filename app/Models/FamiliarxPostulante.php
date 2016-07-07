<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class FamiliarxPostulante extends Model
{
    protected $table = 'familiarxpostulante';

    public static function HabilitadosPostulacion()
    {
    	$familiares=FamiliarxPostulante::all();

    	$habilitados = array();
    	foreach ($familiares as $familiar) {
    		$socio = Socio::where('postulante_id','=',$familiar->persona_id)->first();
    		if($socio==null)
    		{
    			$persona = Persona::find($familiar->persona_id);
    			array_push($habilitados,$persona);
    		}
    	}

    	return $habilitados;
    }
    

    
}
