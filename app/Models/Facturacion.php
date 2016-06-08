<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Facturacion extends Model
{
    protected $table = 'facturacion';
    protected $fillable = 
    ['persona_id',
     'total',
     'tipo_pago',
     'estado'];
     protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
    }

    public function productoxfacturacion(){
        return $this->hasMany('papusclub\Models\ProductoxFacturacion', 'id');
    }
}
