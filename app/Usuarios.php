<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps=false;

    public function tipo_usuario(){
		return $this->hasOne('App\Tipo_Usuario' ,'idtipo_Usuario', 'idtipousuario');
		                      /*ruta modelo tipo   id tipousuario id claveforanea  */
	    }

    public function area(){
		return $this->hasOne('App\Area' ,'idarea', 'idarea');
		                      /*ruta modelo tipo   id claveforanea  id tipousuario*/
    }
}
