<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMembresia extends Model
{
    protected $table = 'tipomembresia';

    protected $fillable=
    ['descripcion',
     'numMaxInvitados'
    ];

    public function tarifa()
	{
		return $this->belongsTo(TarifaMembresia::class,'tarifa_membresia_id');
	}
}
