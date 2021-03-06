<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        $area = new Area();
        $area->nombre=$request->nombre;
        $area->correo=$request->correo;
        $area->extencion=$request->extencion;
        $area->siglas=$request->siglas;
        $area->estado_del='1';
        $area->save();
        return $area;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */

    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */

    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Area $area)
    {
        $area = Area::find($request->idarea);
        $area->nombre=$request->nombre;
        $area->correo=$request->correo;
        $area->extencion=$request->extencion;
        $area->siglas=$request->siglas;
        $area->estado_del='1';
        $area->save();
        return $area;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */

    public function destroy(Area $area)
    {
        //
    }

    public function mostrarareas(){
      $areas= Area::All();
      return response()->json($areas);
    }
    
    public function CargarDatos()
    {
        $areas = Area::where('estado_del','1')->get();
        return response()->json($areas);
    }
    public function buscar($id_busqueda)
    {
        $resultado = Area::find($id_busqueda);
        return response()->json($resultado);
    }
}
