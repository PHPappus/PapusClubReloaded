<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traspaso extends Model
{
    //use SoftDeletes;
    protected $table = 'traspaso';
    protected $fillable = 
    ['nombre',
     'apellido_paterno',
     'apellido_materno',
     'dni',
     'estado'
    ];


    public function socio()
	{
		return $this->belongsTo(Socio::class,'socio_id');
	}

}
