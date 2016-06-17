<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sorteoxsocio extends Model
{
	use SoftDeletes;

    protected $table='socioxsorteo';
    protected $dates = ['deleted_at'];
 	
 	public function sede()
 	{ 		
 		return $this->belongsTo('papusclub\Models\Sorteo','id');
 	}

 	public function socio()
 	{
 		return $this->belongsTo('papusclub\Models\Socio','id');
 	}
}
