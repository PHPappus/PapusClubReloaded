<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoxIngresoProducto extends Model
{
    use SoftDeletes;
    protected $table = 'productoxingresoproducto';
    protected $fillable = 
    ['producto_id',
     'ingresoproducto_id',
     'cantidad',
     'subtotal'];
    protected $dates = ['deleted_at'];

    public function ingresoproducto(){
        return $this->belongsTo('papusclub\Models\IngresoProducto','ingresoproducto_id');
    }

    public function producto(){
        return $this->belongsTo('papusclub\Models\Producto','producto_id');
    }
}
