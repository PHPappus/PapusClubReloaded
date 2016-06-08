<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductoxFacturacion extends Model
{
    protected $table = 'productoxfacturacion';
    protected $fillable = 
    ['producto_id',
     'facturacion_id',
     'cantidad',
     'subtotal'];
    protected $dates = ['deleted_at'];

    public function facturacion(){
        return $this->belongsTo('papusclub\Models\Facturacion','facturacion_id');
    }

    public function producto(){
        return $this->belongsTo('papusclub\Models\Producto','producto_id');
    }
}
