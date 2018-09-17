<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos','cedula','sexo','celular', 'email','password','estado','idtipousuario',
        'idarea',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function area(){
        return $this->hasOne('App\Area','idarea','idarea');
    }
    public function tipo_usuario(){
        return $this->hasOne('App\Tipo_Usuario','idtipo_Usuario','idtipousuario');
    }
    
}
