<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPersona extends Model
{
	use SoftDeletes;
    protected $table = 'tipopersona';
    protected $fillable=
    ['descripcion',
     'fecha_actualizacion'
    ];
    protected $dates = ['deleted_at'];
    
    public function persona(){
        return $this->hasMany('papusclub\Models\TipoPersona','id');
    }

    public function tarifaTaller()
    {
        return $this->belongsToMany(Taller::class,'tarifataller','tipo_persona_id','taller_id')->withPivot('fecha_registro','precio','estado');
    }

    public function tarifasAmbiente()
    {
        return $this->hasMany('papusclub\Models\TarifaAmbientexTipoPersona');
    }

    public function tarifasActividad()
    {
        return $this->hasMany('papusclub\Models\TarifaActividad');
    }
}
