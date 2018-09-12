<?php

namespace App\Http\Controllers;

use App\Dispositivos;
use App\TipoDispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoDispositivo::All();
        return view('adminlte::dispositivos')->with(['tiposDispositivos'=>$tipos]);
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
        $dispositivo = new Dispositivos();
        $dispositivo->idtipodispositivos=$request->idtipodispositivos;
        $dispositivo->nombredispositivo=$request->nombredispositivo;
        $dispositivo->serie=$request->serie;
        $dispositivo->color=$request->color;
        $dispositivo->modelo=$request->modelo;
        $dispositivo->marca=$request->marca;
        $dispositivo->cod_activo=$request->cod_activo;
        $dispositivo->save();
        return $dispositivo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         
        //return json_encode($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivos $dispositivos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dispositivos  $dispositivos
     * @return \Illuminate\Http\Response
     */
    public function destroy($dispositivos)
    {
       $dispositivo=Dispositivos::find($dispositivos);
       //$usuario->fecha_clausura=Carbon::now()->toDateTimeString(); // obtenemos la fecha de eliminacion
       //$usuario->estado='No Disponible'; // modificamos el estado a F de finalisado
       $dispositivo->delete();
    }

    public function obtenerlista()
    {
       $dispositivos = DB::table('dispositivos')->get();
       $tipos= DB::table('tipodispositivos')->get();

       $consulta = array(
            "dispositivos"=>$dispositivos, 
            "tipos"=>$tipos
       );

        return response()->json($consulta);
    }
}
