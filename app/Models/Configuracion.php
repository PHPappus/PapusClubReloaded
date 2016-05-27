<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracion extends Model
{
    use SoftDeletes;
    protected $table = 'configuracion';
    protected $fillable = 
    ['valor', 
    'grupo', 
    'descripcion'
    ];
    protected $dates = ['deleted_at'];

}
