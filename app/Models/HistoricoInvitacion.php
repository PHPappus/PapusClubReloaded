<?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoricoInvitacion extends Model
{
    use SoftDeletes;
    protected $table = 'historicoinvitacion';

    protected $fillable=
    ['fecha_invitacion'
    ];

    public function sede()
    {
    	return $this->belongsTo(Sede::class,'sede_id');
    }

    public function invitado()
    {
    	return $this->belongsTo(Invitados::class,'invitado_id');
    }
}
