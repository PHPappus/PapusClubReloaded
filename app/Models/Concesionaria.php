<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Concesionaria extends Model
{
   use SoftDeletes; 
   protected $table = 'concesionaria';
    protected $fillable = 
    ['sede_id',
     'nombre',
     'ruc',
     'descripcion',
     'telefono', 
     'correo',
     'nombre_responsable',
     'estado',
     'tipo_concesionaria',
     'fecha_inicio_concesion',
     'fecha_fin_concesion'];

     protected $dates = ['deleted_at'];
    
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede', 'sede_id');
    }
}
