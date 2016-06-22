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
}
