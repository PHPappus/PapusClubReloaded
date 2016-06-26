<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonaxTaller extends Model
{
    use SoftDeletes;
    protected $table = 'personaxtaller';
   
    protected $dates = ['deleted_at'];
}
