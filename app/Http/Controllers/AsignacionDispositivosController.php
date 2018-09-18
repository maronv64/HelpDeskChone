<?php

namespace App\Http\Controllers;

use App\Asignacion_Dispositivos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsignacionDispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::layouts.partials.GestionAsigDispositivos.AsigDispositivos');
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
        $asignacion_Dispositivos= new Asignacion_Dispositivos();
        $asignacion_Dispositivos->usuario_idUsuario=$request->idusuario;
        $asignacion_Dispositivos->dispositivo_iddispositivo=$request->iddispositivo;
        $asignacion_Dispositivos->fecha_inicio=date("Y-m-d",strtotime( $request->fecha_inicio));
        $asignacion_Dispositivos->fecha_fin=date("Y-m-d",strtotime( $request->fecha_fin));
        $asignacion_Dispositivos->save();
        return response()->json($asignacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignacion_Dispositivos  $asignacion_Dispositivos
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacion_Dispositivos $asignacion_Dispositivos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignacion_Dispositivos  $asignacion_Dispositivos
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacion_Dispositivos $asignacion_Dispositivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignacion_Dispositivos  $asignacion_Dispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacion_Dispositivos $asignacion_Dispositivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignacion_Dispositivos  $asignacion_Dispositivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacion_Dispositivos $asignacion_Dispositivos)
    {
        //
    }
}
