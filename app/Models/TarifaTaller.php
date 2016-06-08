<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaTaller extends Model
{
	use SoftDeletes;
    protected $table = 'tarifataller'; 

    protected $fillable=
    ['fecha_registro',
 	 'precio',
 	 'estado'
    ];

    public function taller()
	{
		return $this->belongsTo(Taller::class,'taller_id');
	}
}
