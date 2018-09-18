<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsigTareas extends Model
{
    protected $table= "user_asignacion";
    protected $primaryKey ="iduser_asignacion";
    public $timestamps=false;
}
