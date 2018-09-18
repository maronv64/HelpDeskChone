<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Peticion extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps=false;

    protected $table = 'peticion';
    //public $timestamps=false;
    protected $primaryKey = 'idpeticion';
    protected $fillable = [
        'idpeticion', 'idprioridad','idestado','idtipopeticion','idusuario', 'descripcion','estado_del','created_at','update_at',
    ];

    public function prioridad(){
        return $this->hasOne('App\Prioridad','idprioridad','idprioridad');
    }
    public function estado(){
        return $this->hasOne('App\Estado','idestado','idestado');
    }
    public function tipo_peticion(){
        return $this->hasOne('App\TipoPeticion','idtipopeticion','idtipopeticion');
    }
    public function usuario(){
        return $this->hasOne('App\User','id','idusuario')->with('area');
    }

}
