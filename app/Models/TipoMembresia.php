<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMembresia extends Model
{
	use SoftDeletes;
    protected $table = 'tipomembresia';

    protected $fillable=
    ['descripcion',
     'numMaxInvitados'
    ];
    protected $dates = ['deleted_at'];

    public function tarifa()
	{
		return $this->belongsTo(TarifaMembresia::class,'tarifa_membresia_id');

        //return $this->hasOne(TarifaMembresia::class,'tarifa_membresia_id');
	}

    public function socio()
    {
        return $this->hasMany(Socio::class);
        //return $this->belongsTo(Socio::class);
    }
}
