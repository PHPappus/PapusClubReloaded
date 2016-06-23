<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Facturacion extends Model
{
    use SoftDeletes;
    protected $table = 'facturacion';
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

    public function reserva(){
        return $this->belongsTo('papusclub\Models\Reserva');
    }

    public function productoxfacturacion(){
        return $this->hasMany('papusclub\Models\ProductoxFacturacion');
    }
}
