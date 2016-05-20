<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMembresia extends Model
{
    protected $table = 'tipomembresia';

    public function tarifa()
	{
		return $this->belongsTo(TarifaMembresia::class);
	}
}
