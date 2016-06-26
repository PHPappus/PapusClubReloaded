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


    public function actividades(){
        return $this->belongsToMany('papusclub\Models\Actividad')->withPivot('precio');
    }

    public function talleres(){
        return $this->belongsToMany(Taller::class,'personaxtaller','persona_id','taller_id')->withPivot('precio')->whereNull('personaxtaller.deleted_at')->withTimestamps();
    }

    public function usuario(){
        return $this->belongsTo('papusclub\User','id');
    }

    public function facturacion(){
        return $this->hasMany('papusclub\Models\Facturacion');
    }

/*acceso: $postulante->familiarxpostulante->pivot->(elementos tabla intermedia)*/
    public function familiarxpostulante()
    {
        return $this->belongsToMany(Postulante::class,'familiarxpostulante','persona_id','postulante_id')->withPivot('tipo_familia_id','estado')->whereNull('familiarxpostulante.deleted_at')->withTimestamps();

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
        return $this->belongsToMany(Postulante::class,'familiarxpostulante','persona_id','postulante_id')->withPivot('tipo_familia_id','estado')->withTimestamps();   
    }

    public function invitados()
    {
        return $this->belongsToMany(Persona::class,'invitados','persona_id','invitado_id')->withPivot('id','fecha_registro')->withTimestamps();
    }

    public function addInvitado(Persona $invitado, $fecha_registro)
    {
        if($this->id==$invitado->id)
        {
            return false;
        }
        else
        {
            $existe=false;
            $invitados = $this->invitados;
            $count =count($invitados);
            $i=0;
            while(!$existe && $i<$count)
            {
                $inv =$invitados[$i];
                if($inv->id==$invitado->id)
                {
                    $existe=true;
                }
                $i++;
            }
            if(!$existe)
            {
                $this->invitados()->save($invitado,['fecha_registro'=>$fecha_registro]);
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function socio($socios)
    {
        
        foreach ($socios as $socio) {
            //echo $socio->postulante->persona->id;
            //echo $this->id;
            if($socio->postulante->persona->id == $this->id)
                return $socio;
        }
    
        return null;

    }

    
     public function ingresoproducto(){
        return $this->hasMany('papusclub\Models\IngresoProducto');
    }
    public function ingresos(){
        return $this->hasMany('papusclub\Models\HistoricoIngreso','id');
    }
    
}
