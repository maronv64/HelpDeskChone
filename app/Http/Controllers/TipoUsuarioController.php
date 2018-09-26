<?php

namespace App\Http\Controllers;

use App\Tipo_Usuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
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
        $tipousuario = new Tipo_Usuario();
        $tipousuario->descripcion=$request->descripcion;
        $tipousuario->save();
        return $tipousuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo_Usuario  $tipo_Usuario
     * @return \Illuminate\Http\Response
     */
    
    public function show(Tipo_Usuario $tipo_Usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo_Usuario  $tipo_Usuario
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Tipo_Usuario $tipo_Usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo_Usuario  $tipo_Usuario
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Tipo_Usuario $tipo_Usuario)
    {
        $tipoUsuario = Tipo_Usuario::find($request->idtipo_Usuario);
        $tipoUsuario->descripcion=$request->descripcion;
        $tipoUsuario->save();
        return $tipoUsuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo_Usuario  $tipo_Usuario
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Tipo_Usuario $tipo_Usuario)
    {
        //
    }

    public function mostrartiposusuarios(){
        $tipouser = Tipo_Usuario::All();
        return response()->json($tipouser); 
    }
    public function buscar($id_busqueda)
    {
        $resultado = Tipo_Usuario::find($id_busqueda);
        return response()->json($resultado);
    }
}
