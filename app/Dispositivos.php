<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    protected $table = 'dispositivos';
    protected $primaryKey = 'iddispositivos';
    public $timestamps=false;

    // public function consultar_dispositivos_asignados(){
    //     return $this->hasOne('App\Asignacion_Dispositivos' ,'iddispositivos', 'dispositivos_iddispositivos');
    // }      
}
