<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Postulante extends Model
{
    use SoftDeletes;
    protected $table = 'postulante';
    protected $fillable = 
    ['ruc', 
    'direccion',  
    'pais_nacimiento', 
    'lugar_nacimiento', 
    'colegio_primario', 
    'colegio_secundario',
    'univeridad', 
    'profesion', 
    'centro_trabajo',
    'cargo_centro_trabajo', 
    'direccionLaboral', 
    'estado_civil',
    'nro_hijos', 
    'domicilio', 
    'telefono_domicilio',
    'telefono_celular'
    ];
    protected $dates = ['deleted_at'];

    public function persona()
    {
        //return Persona::find($this->id_postulante);
        return $this->belongsTo(Persona::class,'id_postulante','id');
    }



/*acceso: $postulante->familiarxpostulante->pivot->(elementos tabla intermedia)*/
/*Guardar en tabla intermedia: $postulante->familiarxpostulante()->save($persona,['elemento'=>$valor,'elemento' =>$valor2...]);*/
    public function familiarxpostulante()
    {
        return $this->belongsToMany(Persona::class,'familiarxpostulante')->withPivot('postulante_id')->whereNull('familiarxpostulante.deleted_at')->withTimestamps();
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
        return $this->belongsToMany(Persona::class,'familiarxpostulante')->withPivot('postulante_id')->withTimestamps();   
    }


    
}
