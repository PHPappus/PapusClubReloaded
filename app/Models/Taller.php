<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'taller'; 

    protected $fillable=
    ['descripcion',
     'vacantes'
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('precio');
    }

}
