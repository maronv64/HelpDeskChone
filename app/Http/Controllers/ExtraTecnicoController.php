<?php

namespace App\Http\Controllers;

use App\Extra_Tecnico;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtraTecnicoController extends Controller
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
        $extecnico = new Extra_Tecnico();
        $extecnico->especialidad = $request->descripcion;
        $extecnico->idusuario = $request->idusuario;
        $extecnico->save();
        return response()->json($extecnico); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extra_Tecnico  $extra_Tecnico
     * @return \Illuminate\Http\Response
     */

    public function show(Extra_Tecnico $extra_Tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extra_Tecnico  $extra_Tecnico
     * @return \Illuminate\Http\Response
     */

    public function edit(Extra_Tecnico $extra_Tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extra_Tecnico  $extra_Tecnico
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Extra_Tecnico $extra_Tecnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extra_Tecnico  $extra_Tecnico
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $idextra= Extra_Tecnico::where('idusuario', $id)->first();
        $eliminextra = Extra_Tecnico::find($idextra->idextra_tecnico);
        $user = Usuarios::find($id);
        $eliminextra->delete();
        $user->delete();
    }

     public function mostrarextratecnico(){
        $extratecnico = Extra_Tecnico::All();
        return response()->json($extratecnico); 
    }
}
