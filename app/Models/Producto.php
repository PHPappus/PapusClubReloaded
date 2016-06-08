<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{    
	use SoftDeletes;
	protected $table = 'producto';
    protected $fillable = 
    ['nombre',
     'descripcion',
     'estado',
     'tipo_producto'];
    protected $dates = ['deleted_at'];
     
    public function productoxfacturacion(){
        return $this->hasMany('papusclub\Models\ProductoxFacturacion', 'id');
    }

    public function productoxproveedor(){
        return $this->hasMany('papusclub\Models\ProductoxProveedor', 'id');
    }

    public function precioproducto(){
        return $this->hasMany('papusclub\Models\PrecioProducto');
    }
}
