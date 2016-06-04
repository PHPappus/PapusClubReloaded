<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifaMembresia extends Model
{
	use SoftDeletes;
    protected $table = 'tarifamembresia';

    protected $fillable=[
    'monto',
    'estado',
    'fecha_registro'
    ];
    protected $dates = ['deleted_at'];

    public function tipo()
	{
		return $this->hasMany(TipoMembresia::class);
		//return $this->belongsTo(TipoMembresia::class);
	}

	public function addTipo(TipoMembresia $tipo)
	{
		return $this->tipo()->save($tipo);		
	}
}
