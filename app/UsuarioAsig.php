<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAsig extends Model
{
    protected $table = 'user_asignacion';
    protected $primaryKey = 'iduser_asignacion';
    public $timestamps=false;

    public function Peticion(){
        return $this->hasOne('App\Peticion','idpeticion','peticion_idpeticion')->with('prioridad','estado','tipo_peticion','usuario');
    }


}
