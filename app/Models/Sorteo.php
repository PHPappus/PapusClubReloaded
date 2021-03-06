<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sorteo extends Model
{
	use SoftDeletes;

    protected $table='sorteo';
    protected $dates = ['deleted_at'];
 	
 	public function sede()
 	{
 		return $this->belongsTo('papusclub\Models\Sede','id_sede');
 	}
}
