<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ambiente extends Model
{
    use SoftDeletes;
    protected $table = 'ambiente';
    protected $fillable = 
    ['nombre', 
    'tipo_ambiente', 
    'capacidad_actual',     
    'ubicacion'
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede', 'sede_id');
    }
    
    public function actividades(){
        return $this->hasMany('papusclub\Models\Actividad', 'id');
    }

    public function reservas()
    {
        return $this->hasMany('papusclub\Models\Reserva', 'id');
    }

    public function tarifas()
    {
        return $this->hasMany('papusclub\Models\TarifaAmbientexTipoPersona', 'id');
    }
}
