<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaTaller extends Model
{
    protected $table = 'tarifataller'; 

    protected $fillable=
    ['fecha_registro',
 	 'precio',
 	 'estado'
    ];
}
