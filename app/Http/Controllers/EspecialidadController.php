<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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
        $especialidad = new Especialidad();
        $especialidad->descripcion=$request->descripcion;
        $especialidad->save();
        return $especialidad;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */

    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */

    public function edit(Especialidad $especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Especialidad $especialidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */

    public function destroy(Especialidad $especialidad)
    {
        //
    }

    public function mostrarespecialidad(){
        $especialidad= Especialidad::All();
        return response()->json($especialidad);
    }
    
    public function buscar($id_busqueda)
    {
        $resultado = Especialidad::find($id_busqueda);
        return response()->json($resultado);
    }
}
