<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeticion extends Model
{
    //
    protected $table = 'tipopeticion';

    protected $fillable = [
        'idtipopeticion', 'descripcion','estado_del',
    ];
}
