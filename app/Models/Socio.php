<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
	use SoftDeletes;

    protected $table='socio';
    protected $dates = ['deleted_at'];
    protected $fillable = 
    ['estado', 
    'fecha_ingreso'
    ];


    public function membresia()
    {
    	return $this->belongsTo(TipoMembresia::class,'tipo_membresia_id');//->withTrashed();
    }

    public function postulante()
    {
    	return $this->belongsTo(Postulante::class,'postulante_id','id_postulante');
    }

    public function carnets()
    {
        return $this->hasMany(Carnet::class);
    }

    public function carnet_actual()
    {
        $match = ['socio_id'=>$this->id,'estado'=>true];
        $ormatch = ['socio_id'=>$this->id];
        $carnet=Carnet::withTrashed()->where($match)->first();
        if($carnet==null)
            $carnet=Carnet::withTrashed()->where($ormatch)->first();
        return $carnet;
    }

    public function estado()
    {
        if($this->estado)
        {
            $carnet = $this->carnet_actual();
            if($carnet->estado)
            {
                if($carnet->fecha_emision<$carnet->fecha_vencimiento)
                {
                    $respuesta =$this->vigente();
                }
                else
                {
                    $respuesta =$this->vencido();
                }
            }
            else
            {
                $respuesta=$this->carnet_inhabilitado();
            }
        }
        else
        {
            $respuesta = $this->inhabilitado();
        }
        return $respuesta;
    }

    public function vigente()
    {
        return 'Vigente';
    }

    public function vencido()
    {
        return 'Carnet vencido';
    }

    public function carnet_inhabilitado()
    {
        return 'Carnet inhabilitado';
    }

    public function inhabilitado()
    {
        return 'Socio inhabilitado';
    }

    public function isIndependent()
    {
        //$persona = $this->postulante->persona;
        /*Aqui se harán las validaciones de si otras tablas están dependiendo de él como lo es las reservas, por el momento devolvere false diciendo que no es independiente de tal manera que se use softdelete*/
        /*Comparar respecto a persona*/
        return false;
    }

    public function default_estado()
    {
        return "El socio se encuentra habilitado. El carnet se encuentra vigente.";
    }

    public function addCarnet(Carnet $carnet)
    {
        return $this->carnets()->save($carnet);
    }

    public function multaxpersona()
    {
        return $this->belongsToMany(Multa::class,'multaxpersona','socio_id','multa_id')->withPivot('multa_modificada','descripcion_detallada','fecha_registro');
    }

    public function traspaso()
    {
        return $this->hasMany(Traspaso::class);
    }

    
}
