<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    //
    protected $table = 'prioridad';
    public $timestamps=false;
    protected $fillable = [
        'idprioridad', 'descripcion','estado_del',
    ];
}
