<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model
{

    use SoftDeletes;
    protected $table = 'taller'; 

    protected $fillable=
    ['nombre',
     'descripcion',
     'vacantes',
     'fecha_inicio_inscripciones',
     'fecha_fin_inscripciones',
     'fecha_inicio',
     'fecha_fin',
     'cantidad_sesiones'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('precio');
    }

    public function tarifaTaller()
    {
        return $this->belongsToMany(TipoPersona::class,'tarifataller','taller_id','tipo_persona_id')->withPivot('fecha_registro','precio','estado');
    }

}
