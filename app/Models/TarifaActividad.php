<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaActividad extends Model
{
    use SoftDeletes;
    protected $table = 'tarifaactividad';
    protected $fillable = 
    ['precio',
    ];
   	protected $dates = ['deleted_at'];

   	public function actividad()
   	{
   		return $this->belongsTo('papusclub\Models\Actividad', 'actividad_id');
   	}

	
   	public function tipo_persona()
   	{
   		return $this->belongsTo('papusclub\Models\TipoPersona', 'tipo_persona_id');
   	}
}
