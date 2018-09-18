<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsigTareas extends Model
{
    protected $table= "asignacion";
    protected $primaryKey ="idasignacion";
    public $timestamps=false;
}
