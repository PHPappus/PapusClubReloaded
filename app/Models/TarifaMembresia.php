<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class TarifaMembresia extends Model
{
    protected $table = 'tarifamembresia';

    public function tipo()
	{
		return $this->hasMany(TipoMembresia::class);
	}
}
