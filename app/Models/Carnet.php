<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carnet extends Model
{
	use SoftDeletes;

    protected $table='carnet';
    protected $dates = ['deleted_at'];
    protected $fillable = 
    ['nro_carnet', 
    'fecha_emision',  
    'estado', 
    'fecha_vencimiento' 
    ];    

    public function socio()
    {
    	return $this->belongsTo(Socio::class,'socio_id');
    }

}
