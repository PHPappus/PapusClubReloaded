<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $table = 'reservas';
    protected $fillable = 
<<<<<<< HEAD
    ['fecha_reserva', 
=======
    ['fecha_inicio_reserva',
    'fecha_fin_reserva', 
>>>>>>> c4b73e2d2c3d29c8742e35afebc1eb5633dc932a
    'precio', 
    'estadoReserva'
    ];
    protected $dates = ['deleted_at'];
    //funciones para las relaciones entre tablas
    
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente');
        
    }
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede');
        
    }
    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
        
    }
}
