<?php

namespace App\Http\Controllers;

use App\AsigTareas;
use App\UsuarioAsig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $asignacion= new AsigTareas();
        $asignacion->peticion_idpeticion=$request->idpeticion;
        $asignacion->usuario_idUsuario=$request->idusuario;
        $asignacion->FechaRegistro=$date;
        $asignacion->FechaInicio=date("Y-m-d",strtotime( $request->FechaInicial));
        $asignacion->HoraInicial=date("H:i:s",strtotime( $request->HoraInicial));
        $asignacion->FechaLimite=date("Y-m-d",strtotime( $request->FechaLimite));
        $asignacion->HoraLimite=date("H:i:s",strtotime( $request->HoraLimite));
        $asignacion->observacion=$request->observacion;
        $asignacion->save();
        return response()->json($asignacion);
        

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
}
