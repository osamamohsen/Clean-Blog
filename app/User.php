<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use App\User;
use Illuminate\Database\Eloquent\Model;
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
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function articles(){
        return $this->hasMany('App\Articles');
    }

    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }

    public static $rulesLogin = [
        'email' => 'required',
        'password' => 'required'
    ];

    public static $rulesRegister = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3'
    ];
}
