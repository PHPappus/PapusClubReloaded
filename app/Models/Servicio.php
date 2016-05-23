<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'Servicios';
    protected $fillable = 
    ['nombre', 
    'descripcion', 
    'tipo_servicio',     
    ];
}
