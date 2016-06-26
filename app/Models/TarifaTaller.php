<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaTaller extends Model
{
	use SoftDeletes;
    protected $table = 'tarifataller'; 

    protected $fillable=
    ['fecha_registro',
 	 'precio',
 	 'estado'
    ];
    protected $dates = ['deleted_at'];
/*
    public function talleres()
	{
		return $this->belongsToMany('App\Models\Taller')->withPivot('precio');
	}*/

	public function tipo_persona()
   	{
   		return $this->belongsTo('papusclub\Models\TipoPersona', 'tipo_persona_id');
   	}

   		public function taller()
   	{
   		return $this->belongsTo('papusclub\Models\Taller', 'taller_id');
   	}

}
