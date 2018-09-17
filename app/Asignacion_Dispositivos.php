<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion_Dispositivos extends Model
{
    protected $table = 'usuario_dispositivo';
    protected $primaryKey = 'idusuario_dispositivo';
    public $timestamps=false;

    public function usuario(){
		return $this->hasOne('App\Usuarios' ,'idusuario', 'idusuario');
		                      /*ruta modelo tipo   id tipousuario id claveforanea  */
    }
        
    public function dispositivos(){
        return $this->hasOne('App\Dispositivos' ,'iddispositivos', 'iddispositivos');
                                /*ruta modelo tipo   id tipousuario id claveforanea  */
    }
        
            
}
