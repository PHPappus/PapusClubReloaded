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
        return $this->belongsToMany(Persona::class,'familiarxpostulante','postulante_id','persona_id')->withPivot('tipo_familia_id','estado')->whereNull('familiarxpostulante.deleted_at')->withTimestamps();
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
        return $this->belongsToMany(Persona::class,'familiarxpostulante','postulante_id','persona_id')->withPivot('tipo_familia_id','estado')->withTimestamps();   
    }

    public function addFamiliar(Persona $familiar,$tipo_familia_id)
    {
        return $this->familiarxpostulante()->save($familiar,['tipo_familia_id'=>$tipo_familia_id]);
    }


    public function socio()
    {
        return $this->hasOne(Socio::class,'id');
    }

    public function es_socio()
    {
        $id_postulante = $this->id_postulante;
        $socio = Socio::where('postulante_id','=',$id_postulante)->first();
        if($socio)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function Departamento()
    {
        return $this->belongsTo(Departamento::class,'departamento');
    }

    public function Provincia()
    {
        return $this->belongsTo(Provincia::class,'provincia');
    }

    public function Distrito()
    {
        return $this->belongsTo(Distrito::class,'distrito');
    }


    public function observacion()
    {
        return $this->belongsToMany(Socio::class,'observaciones','postulante_id','socio_id')->withPivot('observacion');
    }

        public function DepartamentoVivienda()
    {
        return $this->belongsTo(Departamento::class,'departamento_vivienda');
    }

    public function ProvinciaVivienda()
    {
        return $this->belongsTo(Provincia::class,'provincia_vivienda');
    }

    public function DistritoVivienda()
    {
        return $this->belongsTo(Distrito::class,'distrito_vivienda');
    }

    
}
