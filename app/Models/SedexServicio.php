<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'sedexservicio';
    protected $fillable = 
    ['idsede', 
    'idservicio',     
    ];
}
