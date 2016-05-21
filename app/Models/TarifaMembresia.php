<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class TarifaMembresia extends Model
{
    protected $table = 'tarifamembresia';

    protected $fillable=[
    'monto',
    'estado',
    'fecha_registro'
    ];

    public function tipo()
	{
		return $this->hasMany(TipoMembresia::class);
	}

	public function addTipo(TipoMembresia $tipo)
	{
		return $this->tipo()->save($tipo);		
	}
}
