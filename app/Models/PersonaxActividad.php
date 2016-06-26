<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonaxActividad extends Model
{
    use SoftDeletes;
    protected $table = 'actividad_persona';
   
    protected $dates = ['deleted_at'];
}
