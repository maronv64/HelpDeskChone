<?php

namespace App\Http\Controllers;

use App\AsigTareas;
use App\UsuarioAsig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $asignacion= new AsigTareas();
        $asignacion->Ficha_idFicha='1';
        $asignacion->peticion_idpeticion=$request->idpeticion;
        $asignacion->FechaRegistro=date("Y-m-d",strtotime("00-00-00"));
        $asignacion->FechaInicio=date("Y-m-d",strtotime( $request->FechaInicial));
        $asignacion->FechaLimite=date("Y-m-d",strtotime( $request->FechaLimite));
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
}
