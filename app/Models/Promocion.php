<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Promocion extends Model
{
    use SoftDeletes;
    protected $table = 'promocion';
    protected $fillable = 
    ['estado',
    'descripcion' ,
    'montoDescuento' ,
    'porcentajeDescuento'
    //'fecha_registro'
    ];

    
    protected $dates = ['deleted_at'];
    
    
}
