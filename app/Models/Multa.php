<?php

namespace papusclub\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
	use SoftDeletes;
    protected $table = 'multa';


    protected $fillable=
    ['nombre',
     'descripcion',
     'montoPenalidad',
     'estado'
    ];
}
