<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multa';

    protected $fillable=
    ['descripcion',
     'montoPenalidad',
     'estado'
    ];
}
