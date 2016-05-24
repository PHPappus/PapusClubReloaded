    <?php

namespace papusclub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Postulante extends Model
{
    use SoftDeletes;
    protected $table = 'postulante';
    protected $fillable = 
    ['ruc', 
    'direccion', 
    'carnet_extranjeria', 
    'pais_nacimiento', 
    'lugar_nacimiento', 
    'colegio_primario', 
    'colegio_secundario',
    'univeridad', 
    'profesion', 
    'centro_trabajo',
    'cargo_centro_trabajo', 
    'direccionLaboral', 
    'estado_civil',
    'nro_hijos', 
    'domicilio', 
    'telefono_domicilio',
    'telefono_celular'
    ];
    protected $dates = ['deleted_at'];
    
}
