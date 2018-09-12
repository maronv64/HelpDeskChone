<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDispositivo extends Model
{
   protected $table = 'tipodispositivos';
   protected $primaryKey = 'idtipodispositivos';
   public $timestamps=false;
}

