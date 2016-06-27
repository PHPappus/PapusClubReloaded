<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioxSedexPersona extends Model
{
    use SoftDeletes;
    protected $table = 'servicioxsedexpersona';
    protected $fillable = 
    ['id_servicio', 
    'id_sede', 
    'id_persona',
    'precio',
    'fecha_registro',
    'codreserva',
    'estado',       
    'calificacion',
    'descripcion'
    ];    
    protected $dates = ['deleted_at'];
}


