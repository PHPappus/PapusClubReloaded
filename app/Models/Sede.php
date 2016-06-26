<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sede extends Model
{
    use SoftDeletes;
    protected $table = 'sede';
    protected $fillable = 
    ['nombre', 
    'telefono', 
    'departamento', 
    'provincia', 
    'distrito', 
    'direccion', 
    'referencia',  
    'nombre_contacto', 
    'capacidad_maxima',
    'capacidad_socio'
    ];
    protected $dates = ['deleted_at'];
    
    function ambientes(){
        return $this->hasMany('papusclub\Models\Ambiente', 'id');
    }

    function actividades(){
        return $this->hasMany('papusclub\Models\Actividad', 'id');
    }

    function invitaciones(){
        return $this->hasMany(HistoricoInvitacion::class);
    }

    public function talleres(){
        return $this->hasMany(Taller::class);
    }
    public function ingresos(){
        return $this->hasMany('papusclub\Models\HistoricoIngreso','id');
    }
}
