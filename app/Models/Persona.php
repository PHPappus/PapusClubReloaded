<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persona extends Model
{
    use SoftDeletes;
    protected $table = 'persona';
    protected $fillable = 
    ['nacionalidad',
    'doc_identidad', 
    'carnet_extranjeria',
    'nombre', 
    'ap_paterno', 
    'ap_materno', 
    'sexo',
    'fecha_nacimiento', 
    'correo', 
    'id_tipo_persona', 
    'id_usuario'
    ];
    protected $dates = ['deleted_at'];
    
    public function tipopersona(){
        return $this->belongsTo('papusclub\Models\TipoPersona','id_tipo_persona');
    }

    public function trabajador(){
        return $this->belongsTo('papusclub\Models\Trabajador','id');
    }

    public function reservas()
    {
        return $this->hasMany('papusclub\Models\Reserva', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo('papusclub\User', 'id_usuario');
    }
}
