<?php

namespace App\Http\Controllers;

use App\AsigTareas;
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
        //
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
