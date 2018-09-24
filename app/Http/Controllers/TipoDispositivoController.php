<?php

namespace App\Http\Controllers;

use App\TipoDispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDispositivoController extends Controller
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
        $tipodispositivo = new TipoDispositivo();
        $tipodispositivo->descripcion=$request->descripcion;
        $tipodispositivo->save();
        return $tipodispositivo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoDispositivo  $tipoDispositivo
     * @return \Illuminate\Http\Response
     */

    public function show(TipoDispositivo $tipoDispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoDispositivo  $tipoDispositivo
     * @return \Illuminate\Http\Response
     */

    public function edit(TipoDispositivo $tipoDispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoDispositivo  $tipoDispositivo
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, TipoDispositivo $tipoDispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoDispositivo  $tipoDispositivo
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(TipoDispositivo $tipoDispositivo)
    {
        //
    }
    public function mostrardispositivos(){
        $tipoDispositivo= TipoDispositivo::All();
        return response()->json($tipoDispositivo);
    }
}
