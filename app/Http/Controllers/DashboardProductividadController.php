<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Peticion;
use App\Prioridad;
use App\TipoPeticion;
use App\User;
use App\Areas;
use App\AsigTareas;

class DashboardProductividadController extends Controller
{
    //
    public function index()
    {
        $peticiones = Peticion::all();
        $tipo_peticiones = TipoPeticion::all();
        $estados = Estado::all();
        $prioridades = Prioridad::all();
        $asig_tarea= AsigTareas::all();
        $user=User::all();
        $consulta = array(
            "peticiones"=>$peticiones,
            "tipo_peticiones"=>$tipo_peticiones,
            "estados"=>$estados,
            "prioridades"=>$prioridades,
            "asig_tarea"=>$asig_tarea,
            "user"=>$user,
        );      
        //dd($consulta);
        return view('dashboardproductividad',['consulta'=>$consulta]);
    }
}
