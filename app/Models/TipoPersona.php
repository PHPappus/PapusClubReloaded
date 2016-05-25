<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPersona extends Model
{
	use SoftDeletes;
    protected $table = 'tipopersona';
    protected $fillable=
    ['descripcion',
     'fecha_actualizacion'
    ];
    protected $dates = ['deleted_at'];

}
