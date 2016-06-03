<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
	use SoftDeletes;
    protected $table = 'trabajador';
    protected $fillable=
    ['puesto',
     'fecha_ini_contrato',
     'fecha_fin_contrato'
    ];
    protected $dates = ['deleted_at'];

	public function persona()
    {
        return Persona::find($this->id);
    }
}

