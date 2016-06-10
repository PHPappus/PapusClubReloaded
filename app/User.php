<?php
namespace papusclub;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','perfil_id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $hidden = ['password', 'remember_token'];
    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }
    public function perfil()
    {
        return $this->belongsTo('papusclub\Perfil', 'perfil_id');
    }

    public function persona()
    {
        return $this->hasOne('papusclub\Models\Persona', 'id_usuario');
    }
    
    public function talleres(){
        return $this->belongsToMany('papusclub\Models\Taller')->withPivot('precio');
    }
    
}