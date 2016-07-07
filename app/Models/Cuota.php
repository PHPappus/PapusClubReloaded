<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    
    protected $table = 'cuota';

    protected $fillable=
    ['nombre',
     'motivo',
     'monto',
     'estado'
    ];

}
