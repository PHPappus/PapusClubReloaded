<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedor extends Model
{    
	use SoftDeletes;
	protected $table = 'proveedor';
    protected $fillable = 
    ['nombre_proveedor',
     'ruc',
     'direccion',
     'telefono', 
     'correo',
     'nombre_responsable',
     'estado',
     'tipo_proveedor'];
     protected $dates = ['deleted_at'];


    public function ingresoproducto(){
        return $this->hasMany('papusclub\Models\IngresoProducto');
    }

    public function producto(){
        return $this->hasMany('papusclub\Models\Producto');
    }
}
