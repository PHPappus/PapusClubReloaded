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
    'precio_especial_bungalow',
    'a_realizarse_en',
    'hora_inicio',
    'estado',
    'cupos_disponibles',
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    public function reserva(){
        return $this->belongsTo('papusclub\Models\Reserva', 'reserva_id');
        
    }
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente', 'ambiente_id');
        
    }
    public function personas(){
        return $this->belongsToMany('App\Models\Persona')->withPivot('precio');
    }
    
    public function tarifas()
    {
        return $this->hasMany('papusclub\Models\TarifaActividad');
    }

    public function precio($tipo_persona, $tarifas)
    {
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona_id == $tipo_persona)
                return $tarifa->precio;
        }
        return 0;
    }
}
