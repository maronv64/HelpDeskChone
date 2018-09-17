<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAsig extends Model
{
    protected $table = 'user_asignacion';
    protected $primaryKey = 'iduser_asignacion';
    public $timestamps=false;
}
