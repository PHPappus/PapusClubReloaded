<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mantenimiento extends Model
{
	use SoftDeletes;

    protected $table='mantenimientoBungalow';
    protected $dates = ['deleted_at'];
 	
 	/*public function sede()
 	{
 		return $this->belongsTo('papusclub\Models\Sede','id_sede');
 	}*/
}
