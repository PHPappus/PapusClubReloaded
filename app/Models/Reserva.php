<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $table = 'reserva';
    protected $fillable = 
    ['fecha_inicio_reserva',
    'fecha_fin_reserva', 
    'precio', 
    'estadoReserva'
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente');
        
    }
    
    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
        
    }
}
