<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distrito extends Model
{
    use SoftDeletes;
    protected $table = 'distrito';
    protected $fillable = 
    ['nombre',
     'provincia_id'
    ];
    protected $dates = ['deleted_at'];

}
