<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoricoIngreso extends Model
{
	use SoftDeletes;
	protected $table = 'historicoingreso';

    protected $fillable=
    ['fecha'
    ];
    //
<<<<<<< HEAD
    public function sede(){
        return $this->belongsTo('papusclub\Models\Sede', 'sede_id');
    }
    public function persona(){
        return $this->belongsTo('papusclub\Models\Persona', 'persona_id');
        
    }
=======
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
}
