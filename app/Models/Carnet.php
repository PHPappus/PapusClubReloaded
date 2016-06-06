<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
	use SoftDeletes;

    protected $table='carnet';
    protected $dates = ['deleted_at'];

    public function socio()
    {
    	return $this->belongsTo(Socio::class,'socio_id');
    }

}
