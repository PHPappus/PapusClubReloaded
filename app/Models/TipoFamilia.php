<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class TipoFamilia extends Model
{
    protected $table = 'tipofamilia';

    protected $fillable=
    ['nombre',
     'estado'
    ];

    public function tarifas_familias()
    {
        return $this->belongsToMany(TipoMembresia::class,'tarifafamiliar','tipo_familia_id','tipo_membresia_id')->withPivot('descuento','fecha_registro')->withTimestamps();        
    }
}
