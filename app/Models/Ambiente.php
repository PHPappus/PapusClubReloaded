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
    'descripcion'
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede', 'sede_id');
    }
    
    public function actividades(){
        return $this->hasMany('papusclub\Models\Actividad');
    }

    public function reservas()
    {
        return $this->hasMany('papusclub\Models\Reserva');
    }
    
    public function talleres(){
        return $this->hasMany(Taller::class);
    }

    public function tarifas()
    {
        return $this->hasMany('papusclub\Models\TarifaAmbientexTipoPersona');
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
