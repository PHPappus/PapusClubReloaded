<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Persona extends Model
{
    use SoftDeletes;
    protected $table = 'persona';
    protected $fillable = 
    ['doc_identidad', 
    'nombre', 
    'ap_paterno', 
    'ap_materno', 
    'fecha_nacimiento', 
    'correo', 
    'id_tipo_persona', 
    'id_usuario'
    ];
    protected $dates = ['deleted_at'];
    
    public function tipopersona(){
        return $this->belongsTo('papusclub\Models\TipoPersona');
    }
}
