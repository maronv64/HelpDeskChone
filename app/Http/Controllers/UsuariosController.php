<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\Extra_Tecnico;

use Illuminate\Http\Request;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

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

    /*GUARDAR USUARIOS*/
    public function store(Request $request)
    {
        $user = new Usuarios();
        $user->name = $request->name;
        $user->apellidos=$request->apellidos;
        $user->cedula=$request->cedula;
        $user->sexo = $request->sexo;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->idtipousuario = $request->idtipousuario;
       // $user->idextratecnico = $request->idextratecnico;
        $user->idarea = $request->idarea;
        $user->password= bcrypt($request->password);
        $user->save();
        $userall = Usuarios::with(['tipo_usuario','area'])->find($user->id);
        return response()->json($userall);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $id)
    {   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */


    /*ACTUALIZAR USUARIOS*/
    public function update(Request $request, Usuarios $usuarios)
    {
        $user = Usuarios::find($request->id);
        $user->name = $request->name;
        $user->apellidos=$request->apellidos;
        $user->cedula=$request->cedula;
        $user->sexo = $request->sexo;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->estado = $request->estado;
        $user->idtipousuario = $request->idtipousuario;
       // $user->idextratecnico = $request->idextratecnico;
        $user->idarea = $request->idarea;
        $user->password= bcrypt($request->password);
        $user->save();
        $userall = Usuarios::with('tipo_usuario')->find($user->id);
        return response()->json($userall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */


    /*ELIMINAR PRIMERO SI ES TECNICO DESPUES EL USUARIO*/
    public function destroy($id)
    {
         $user = Usuarios::find($id);
         $idextra= Extra_Tecnico::where('idusuario', $user->id)->first();
         if($idextra==null){
            $user->delete();
        }else{
         $eliminextra = Extra_Tecnico::find($idextra->idextra_tecnico);
         $eliminextra->delete();
        }
         
    }
      /*FUNCIÓN PARA BUSCAR EL USUARIO A ACTUALIZAR */
     public function preparactualizar($id){
        $user = Usuarios::find($id);
        return response()->json($user);
    }

      /*FUNCIÓN PARA MOSTRAR TODOS LOS USUARIOS*/
    public function listadeUsuarios(){   
   
        $userall = Usuarios::with(['tipo_usuario', 'area'])->get();
        return response()->json($userall);
    }
}
