<?php

namespace App\Http\Controllers;

use App\AsigTareas;
use App\UsuarioAsig;
use App\Peticion;
use App\Estado;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AsigTareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         return view('adminlte::layouts.partials.GestionAsigTareas.Asignacion');
    }

    public function misasignaciones()
    {

         return view('adminlte::layouts.partials.GestionAsigTareas.misasignaciones');
    }
     public function idususario(){
     $id=Auth::user()->id;
     return $id;
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        /*Consultar por usuario donde estan asignados*/
        $userasig=DB::table('user_asignacion')
        ->join('users', 'users.id', '=', 'user_asignacion.usuario_idUsuario')
        ->join('peticion', 'peticion.idpeticion', '=', 'user_asignacion.peticion_idpeticion')
        ->join('estado', 'estado.idestado', '=', 'peticion.idestado')
        ->where([['user_asignacion.usuario_idUsuario','=',$request->idusuario],['estado.descripcion','=','Asignada']])
        ->get();

        
        if($userasig!=null){
            foreach ($userasig as $dato) {
                $finicialUser = strtotime($dato->FechaInicio);
                $ffinallUser = strtotime($dato->FechaLimite);
                $fiinicialIngreso = strtotime($request->FechaInicial);
                $ffinalIngreso = strtotime($request->FechaLimite);
                if($finicialUser == $fiinicialIngreso && $ffinalIngreso == $ffinallUser){ //Comparar en el mismo dia
                    $horalimiteUser = strtotime($dato->HoraLimite);
                    $horaInicioUser = strtotime($dato->HoraInicial);
                    $horaInicuiIngreso = strtotime($request->HoraInicial);
                    $horafinalIngreso = strtotime($request->HoraLimite);
                    if(($horaInicuiIngreso <= $horalimiteUser && $horaInicuiIngreso>=$horaInicioUser) ||($horafinalIngreso>=$horaInicioUser && $horafinalIngreso <= $horalimiteUser)){ //Si la hora de inicio es menor a la hora de limite entonces no se puede asignar
                    return 1;
                    }
                }
            }
        }

        $datos = DB::table('user_asignacion')
        ->join('users', 'users.id', '=', 'user_asignacion.usuario_idUsuario')
        ->join('peticion', 'peticion.idpeticion', '=', 'user_asignacion.peticion_idpeticion')
        ->where('user_asignacion.peticion_idpeticion','=', $request->idpeticion )
        ->get();
        if($datos!=null){
        foreach ($datos as $item) {
            if($item->id==$request->idusuario){
            return 0;
        }
        }
        }
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $asignacion = new AsigTareas();
        $asignacion->peticion_idpeticion=$request->idpeticion;
        $asignacion->usuario_idUsuario=$request->idusuario;
        $asignacion->FechaRegistro=$date;
        $asignacion->FechaInicio=date("Y-m-d",strtotime( $request->FechaInicial));
        $asignacion->HoraInicial=date("H:i:s",strtotime( $request->HoraInicial));
        $asignacion->FechaLimite=date("Y-m-d",strtotime( $request->FechaLimite));
        $asignacion->HoraLimite=date("H:i:s",strtotime( $request->HoraLimite));
        $asignacion->observacion=$request->observacion;
        $asignacion->save();
        $peticion= Peticion::find($asignacion->peticion_idpeticion);
        $estado= Estado::where('descripcion', 'Asignada')->first();
        $peticion->idestado=$estado->idestado;
        $peticion->save();
      
    }

    public function guardarUsuariosAsignacion($idusuario,$idasig){
        $UsuarioAsig= new UsuarioAsig();
        $UsuarioAsig->asignacion_idasignacion=$idasig;
        $UsuarioAsig->usuario_idUsuario=$idusuario;
        $UsuarioAsig->save();
        return response()->json($UsuarioAsig);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsigTareas  $asigTareas
     * @return \Illuminate\Http\Response
     */

    public function show(AsigTareas $asigTareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsigTareas  $asigTareas
     * @return \Illuminate\Http\Response
     */

    public function edit(AsigTareas $asigTareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsigTareas  $asigTareas
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, AsigTareas $asigTareas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsigTareas  $asigTareas
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(AsigTareas $asigTareas)
    {
        //
    }

    public function mostrarasignaciones($idpeticion){
        $datos = DB::table('user_asignacion')
        ->join('users', 'users.id', '=', 'user_asignacion.usuario_idUsuario')
        ->join('peticion', 'peticion.idpeticion', '=', 'user_asignacion.peticion_idpeticion')
        ->where('user_asignacion.peticion_idpeticion','=', $idpeticion )
        ->get();
        return response()->json($datos);
    }

     public function mostrarobservacion($idasignacion){
        $datos= AsigTareas::find($idasignacion);
        return response()->json($datos);

     }

       public function consultarPeticionEstado(request $request, $idusuario){
         $datos=DB::table('user_asignacion')
        ->join('users', 'users.id', '=', 'user_asignacion.usuario_idUsuario')
        ->join('peticion', 'peticion.idpeticion', '=', 'user_asignacion.peticion_idpeticion')
        ->join('estado', 'estado.idestado', '=', 'peticion.idestado')
        ->join('area', 'area.idarea', '=', 'users.idarea')
         ->join('prioridad', 'prioridad.idprioridad', '=', 'peticion.idprioridad')
        ->where([['user_asignacion.usuario_idUsuario','=',$idusuario],['estado.descripcion','=','Asignada']])
        ->get();
        return response()->json($datos);
     }
}
