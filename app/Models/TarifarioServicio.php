<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;


class TarifarioServicio extends Model
{

    protected $table = 'tarifarioservicios';

    protected $fillable=
    ['idservicio',
     'idtipopersona',
     'descripcionparafecha',
     'precio',
     'estado'
    ];
}