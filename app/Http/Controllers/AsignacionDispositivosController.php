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
        //
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
