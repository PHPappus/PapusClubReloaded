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

/*acceso: $postulante->familiarxpostulante->pivot->(elementos tabla intermedia)*/
    public function familiarxpostulante()
    {
        return $this->belongsToMany(Postulante::class,'familiarxpostulante','persona_id','postulante_id')->whereNull('familiarxpostulante.deleted_at')->withTimestamps();

        /*PARA UTILIZAR SOFT DELETE
            DB::table('familiarxpostulante')
            ->where('postulante_id', $postulante_id)
            ->where('persona_id', $persona_id)
            ->update(array('deleted_at' => DB::raw('NOW()')));
        */
    }

    public function familiarxpostulanteWithTrashed()
    {
        /*Si es necesario retornar incluso los eliminados con softdelete*/
        return $this->belongsToMany(Postulante::class,'familiarxpostulante','persona_id','postulante_id')->withPivot('postulante_id')->withTimestamps();   
    }    
}
