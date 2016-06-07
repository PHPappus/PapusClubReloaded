<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifarioServicio extends Model
{
	use SoftDeletes;
    protected $table = 'tarifarioservicios';

    protected $fillable=
    ['idservicio',
     'idtipopersona',
     'descripcionparafecha',
     'precio',
     'estado'
    ];
}