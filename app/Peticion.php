<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'peticion';

    protected $fillable = [
        'idpeticion', 'idprioridad','idestado','idtipopeticion','idusuario', 'descripcion','estado_del',
    ];
}
