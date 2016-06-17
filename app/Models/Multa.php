<?php

namespace papusclub\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
	use SoftDeletes;
    protected $table = 'multa';


    protected $fillable=
    ['nombre',
     'descripcion',
     'montoPenalidad',
     'estado'
    ];

    public function multaxpersona()
    {
    	return $this->belongsToMany(Socio::class,'multaxpersona','multa_id','socio_id')->withPivot('multa_modificada','descripcion_detallada','fecha_registro');
    }
    
}
