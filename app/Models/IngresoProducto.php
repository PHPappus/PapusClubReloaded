<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoProducto extends Model
{
    use SoftDeletes;
    protected $table = 'ingresoproducto';
    protected $fillable = 
    ['persona_id',
     'total',
     'tipo_pago',
     'tipo_comprobante',
     'estado'];
     protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
    }

    public function productoxingresoproducto(){
        return $this->hasMany('papusclub\Models\ProductoxIngresoProducto');
    }
}
