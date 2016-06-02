<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $table = 'reservas';
    protected $fillable = 
    ['valor', 
    'grupo', 
    'descripcion'
    ];
    protected $dates = ['deleted_at'];

}
