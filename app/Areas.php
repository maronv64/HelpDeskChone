<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    //
    protected $table = 'area';

    protected $fillable = [
        'idarea', 'nombre','correo','extencion','siglas',
    ];
}
