<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    protected $table = 'dispositivos';
    protected $primaryKey = 'iddispositivos';
    public $timestamps=false; 

    public function tipoDispositivo(){
        return $this->hasOne('App\TipoDispositivo' ,'idtipodispositivos', 'idtipodispositivos');
    }

}
