<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'idtipo_Usuario';
    public $timestamps=false;
}
