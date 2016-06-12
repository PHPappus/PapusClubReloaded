<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Postulante extends Model
{
    use SoftDeletes;
    protected $table = 'postulante';
    protected $primaryKey='id_postulante';   /*IMPORTANTE PORQUE NO RECONOCE CUAL ES SU ID*/
    protected $fillable = 
    ['ruc', 
    'departamento', 
    'provincia', 
    'distrito', 
    'direccion_nacimiento', 
    'colegio_primario',
    'colegio_secundario',
    'universidad',
    'profesion',
    'centro_trabajo',
    'cargo_trabajo',
    'direccion_laboral',
    'estado_civil',
    'nro_hijos',
    'domicilio',
    'telefono_domicilio',
    'telefono_celular',
    'estado'
    ];
    protected $dates = ['deleted_at'];

    public function persona()
    {
        //return Persona::find($this->id_postulante);
        return $this->belongsTo(Persona::class,'id_postulante','id');
    }



/*acceso: $postulante->familiarxpostulante->pivot->(elementos tabla intermedia)*/
/*Guardar en tabla intermedia: $postulante->familiarxpostulante()->save($persona,['elemento'=>$valor,'elemento' =>$valor2...]);*/
/*si ya existe se puede usar atach*/
    public function familiarxpostulante()
    {
        return $this->belongsToMany(Persona::class,'familiarxpostulante','postulante_id','persona_id')->withPivot('relacion','estado')->whereNull('familiarxpostulante.deleted_at')->withTimestamps();
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
        return $this->belongsToMany(Persona::class,'familiarxpostulante','postulante_id','persona_id')->withPivot('relacion','estado')->withTimestamps();   
    }

    public function addFamiliar(Persona $familiar,$relacion)
    {
        return $this->familiarxpostulante()->save($familiar,['relacion'=>$relacion]);
    }


    public function socio()
    {
        return $this->hasOne(Socio::class,'id');
    }
    
}
