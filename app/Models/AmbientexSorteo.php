<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmbientexSorteo extends Model
{
	use SoftDeletes;

    protected $table='ambientessorteo';
    protected $dates = ['deleted_at'];
    
    public function ambiente(){
        return $this->belongsTo('papusclub\Models\Ambiente','id_ambiente');
    }

    public function sorteo(){
        return $this->belongsTo('papusclub\Models\Sorteo','id_sorteo');
    }

}
