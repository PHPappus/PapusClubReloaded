<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
	use SoftDeletes;

    protected $table='socio';
    protected $dates = ['deleted_at'];

    public function membresia()
    {
    	return $this->belongsTo(TipoMembresia::class,'tipo_membresia_id');
    }

    public function postulante()
    {
    	return $this->belongsTo(TipoMembresia::class,'postulante_id');
    }
}
