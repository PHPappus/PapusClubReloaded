<?php

namespace papusclub\Models;


use Illuminate\Database\Eloquent\Model;

class TarifaFamiliar extends Model
{
    protected $table = 'tarifafamiliar';
	protected $fillable = 
	  ['descuento', 
	  	'fecha_registro'
	  ]; 
}
