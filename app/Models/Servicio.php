<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $fillable = 
    ['nombre', 
    'descripcion', 
    'tipo_servicio',     
    'estado',     
    'trabajador',     
    'postulante',     
    'tercero',     
    ];
}
