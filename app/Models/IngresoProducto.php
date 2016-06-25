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
     'proveedor_id',  
     'descripcion',   
     'estado'];
     protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
    }

    public function proveedor(){
        return $this->belongsTo('papusclub\Models\Proveedor');
    }

    public function productoxingresoproducto(){
        return $this->hasMany('papusclub\Models\ProductoxIngresoProducto', 'ingresoproducto_id');
    }
}
