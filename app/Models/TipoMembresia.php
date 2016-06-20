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

    public function tarifas_familias()
    {
        return $this->belongsToMany(TipoFamilia::class,'tarifafamiliar','tipo_membresia_id','tipo_familia_id')->withPivot('descuento','fecha_registro')->withTimestamps();        
    }

    public function add_tarifaFamilia(TipoFamilia $tipo, $descuento, $fecha_registro)
    {
        $this->tarifas_familias()->save($tipo,['descuento'=>$descuento,'fecha_registro'=>$fecha_registro]);
    }

    public function update_tarifaFamilia($id,$descuento)
    {
        $this->tarifas_familias()->sync([$id => ['descuento' => $descuento]],false);
    }
}
