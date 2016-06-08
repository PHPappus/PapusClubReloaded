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

    public function tipo()
    {
        return $this->hasMany(TarifaTaller::class);
    }

    public function addTipo(TarifaTaller $tipo)
    {
        return $this->tipo()->save($tipo);      
    }

}
