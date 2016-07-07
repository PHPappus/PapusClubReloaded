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
     'numero_comprobante',
     'total',
     'tipo_pago',
     'tipo_comprobante',
     'servicio_id',
     'descripcion',
     'estado'];
     protected $dates = ['deleted_at'];

    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona');
    }

    public function reserva(){
        return $this->belongsTo('papusclub\Models\Reserva', 'reserva_id');
    }

    public function productoxfacturacion(){
        return $this->hasMany('papusclub\Models\ProductoxFacturacion');
    }

    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede', 'sede_id');
    }
}
