<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaAmbientexTipoPersona extends Model
{
    //use SoftDeletes;
    protected $table = 'tarifaambientextipopersona';
    protected $fillable = 
    ['precio',
    ];
   	

   	public function ambiente()
   	{
   		return $this->belongsTo('papusclub\Models\Ambiente', 'ambiente_id');
   	}

	
   	public function tipo_persona()
   	{
   		return $this->belongsTo('papusclub\Models\TipoPersona', 'tipo_persona_id');
   	}
    
}
