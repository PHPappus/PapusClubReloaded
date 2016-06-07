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
    	return $this->belongsTo(TipoMembresia::class,'tipo_membresia_id');
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
        $match = ['socio_id'=>$this->id];
        return Carnet::where($match);
    }

    public function isIndependent()
    {
        //$persona = $this->postulante->persona;
        /*Aqui se harán las validaciones de si otras tablas están dependiendo de él como lo es las reservas, por el momento devolvere false diciendo que no es independiente de tal manera que se use softdelete*/
        /*Comparar respecto a persona*/

        return false;

    }
}
