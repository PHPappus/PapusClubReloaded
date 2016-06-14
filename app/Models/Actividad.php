<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividad extends Model
{
    use SoftDeletes;
    protected $table = 'actividad';
    protected $fillable = 
    ['nombre', 
    'tipo_actividad', 
    'capacidad_maxima', 
    'descripcion',
    'a_realizarse_en',
    'hora_inicio',
    'estado',
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente');
        
    }
    public function personas(){
        return $this->belongsToMany('App\Models\Persona')->withPivot('precio');
    }
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede');
    }
}
