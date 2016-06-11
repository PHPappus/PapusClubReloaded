<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmbientexSorteo extends Model
{
	use SoftDeletes;

    protected $table='ambientessorteo';
    protected $dates = ['deleted_at'];
    
}
