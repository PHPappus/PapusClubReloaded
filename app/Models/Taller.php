<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model
{

    use SoftDeletes;
    protected $table = 'taller'; 

    protected $fillable=
    ['nombre',
     'descripcion',
     'vacantes',
     'fecha_inicio_inscripciones',
     'fecha_fin_inscripciones',
     'fecha_inicio',
     'fecha_fin',
     'cantidad_sesiones'
    ];
    protected $dates = ['deleted_at'];
    
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('precio');
    }

    public function tarifaTaller()
    {
        return $this->belongsToMany(TipoPersona::class,'tarifataller','taller_id','tipo_persona_id')->withPivot('fecha_registro','precio','estado');
    }

    public function sede(){
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function ambiente(){
        return $this->belongsTo(Ambiente::class,'ambiente_id');
    }

    public function personas(){
        return $this->belongsToMany(Persona::class,'personaxtaller','persona_id','taller_id')->withPivot('precio')->whereNull('personaxtaller.deleted_at')->withTimestamps();
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class,'reserva_id');
    }

    public function precio($tipo_persona, $tarifas)
    {
        foreach ($tarifas as $tarifa) {
            if($tarifa->tipo_persona_id == $tipo_persona)
                return $tarifa->precio;
        }
        return 0;
    }


    public function tarifas()
    {
        return $this->hasMany('papusclub\Models\TarifaTaller');
    }

}
