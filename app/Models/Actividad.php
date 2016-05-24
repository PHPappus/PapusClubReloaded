<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividad extends Model
{
    use SoftDeletes;
    protected $table = 'actividades';
    protected $fillable = 
    ['nombre', 
    'tipo_actividad', 
    'capacidad_maxima', 
    'descripcion',
    'a_realizarse_en'
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente');
        
    }
}
