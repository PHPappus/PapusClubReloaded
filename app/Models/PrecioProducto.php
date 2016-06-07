<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PrecioProducto extends Model
{
	use SoftDeletes;
    protected $table = 'precioproducto';
    protected $fillable = 
    ['producto_id',
     'precio',
     'estado'];
    protected $dates = ['deleted_at'];

    public function producto(){
        return $this->belongsTo('papusclub\Models\Producto');
    }
}
