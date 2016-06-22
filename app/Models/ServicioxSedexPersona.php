<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;


class ServicioxSedexPersona extends Model
{
    
    protected $table = 'servicioxsedexpersona';
    protected $fillable = 
    ['id_servicio', 
    'id_sede', 
    'id_persona',
    'precio',
    'fecha_registro',
    ];    
}
