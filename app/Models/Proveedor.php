<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{    
	protected $table = 'proveedor';
    protected $fillable = 
    ['nombre_proveedor',
     'ruc',
     'direccion',
     'telefono', 
     'correo',
     'nombre_responsable',
     'estado'];
}
