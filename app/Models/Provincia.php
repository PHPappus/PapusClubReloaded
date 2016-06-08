<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use SoftDeletes;
    protected $table = 'provincia';
    protected $fillable = 
    ['nombre',
     'provincia_id'
    ];
    protected $dates = ['deleted_at'];

}
