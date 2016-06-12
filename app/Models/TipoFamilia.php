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
}
