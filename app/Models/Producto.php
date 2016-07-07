<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{    
	use SoftDeletes;
	protected $table = 'producto';
    protected $fillable = 
    ['proveedor_id',
     'nombre',
     'descripcion',
     'estado',
     'tipo_producto',
     'stock'];
    protected $dates = ['deleted_at'];
     
    public function productoxfacturacion(){
        return $this->hasMany('papusclub\Models\ProductoxFacturacion');
    }

    public function productoxproveedor(){
        return $this->hasMany('papusclub\Models\ProductoxProveedor');
    }

    public function precioproducto(){
        return $this->hasMany('papusclub\Models\PrecioProducto');
    }

    public function proveedor(){
        return $this->belongsTo('papusclub\Models\Proveedor','proveedor_id');
    }
}
