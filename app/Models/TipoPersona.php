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
        return $this->belongsToMany(Taller::class,'tarifataller','tipopersona_id','taller_id')->withPivot('fecha_registro','precio','estado');
    }
}
