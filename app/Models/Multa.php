<?php

namespace papusclub\Models;
//use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multa';

    //use SoftDeletes;

    protected $fillable=
    ['descripcion',
     'montoPenalidad',
     'estado'
    ];
}
