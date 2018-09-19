<?php

namespace App\Http\Controllers;

use App\TipoPeticion;
use Illuminate\Http\Request;

class TipoPeticionController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPeticion  $tipoPeticion
     * @return \Illuminate\Http\Response
     */

    public function show(TipoPeticion $tipoPeticion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPeticion  $tipoPeticion
     * @return \Illuminate\Http\Response
     */

    public function edit(TipoPeticion $tipoPeticion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPeticion  $tipoPeticion
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, TipoPeticion $tipoPeticion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPeticion  $tipoPeticion
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(TipoPeticion $tipoPeticion)
    {
        //
    }
    public function CargarDatos()
    {
        $tipoPeticiones = TipoPeticion::where('estado_del','1')->get();
        return response()->json($tipoPeticiones);
    }
}
