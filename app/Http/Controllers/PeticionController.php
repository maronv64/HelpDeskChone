<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Peticion;
use App\Prioridad;
use App\TipoPeticion;
use App\User;
use App\Areas;

class PeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('peticiones');
        return view('adminlte::layouts.partials.GestionPeticiones.peticiones');
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
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function show(Peticion $peticion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function edit(Peticion $peticion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peticion $peticion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticion $peticion)
    {
        //
    }

    public function CargarDatos(){
        $peticiones = Peticion::where('estado_del','1')->get();

        $tipo_peticiones = TipoPeticion::all();
        $usuarios = User::all();
        $estados = Estado::all();
        $prioridades = Prioridad::all();
        $areas = Areas::all();

        $consulta = array(
            "peticiones"=>$peticiones,
            "tipo_peticiones"=>$tipo_peticiones,
            "estados"=>$estados,
            "prioridades"=>$prioridades,
            "usuarios"=>$usuarios,
            "areas"=>$areas,
        );      
        

        return response()->json($consulta);

        // $consulta2 = DB::table('peticion')
        //                                     ->join('users','peticion.idusuario','users.id')
        //                                     ->join('estado','peticion.idestado','estado.idestado')
        //                                     ->join('prioridad','peticion.idprioridad','prioridad.idprioridad')
        //                                     ->get();
        // return $consulta2;
                                            
        /*
        $consulta = array(
            "peticiones"=>$peticiones
        );
        return response()->json($consulta2);
        */
    }

    public function CargarDatos2(){
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->get();//where('estado_del','1')->get();
//        $peticiones = Peticion::with('prioridad','estado','tipo_peticion')->get();//where('estado_del','1')->get();
        //dd($peticiones);
    //return;
        return response()->json($peticiones);
    }

    public function datospeticion($id){
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where('idpeticion','2')->get();//where('estado_del','1')->get();
//        $peticiones = Peticion::with('prioridad','estado','tipo_peticion')->get();//where('estado_del','1')->get();
        //dd($peticiones);
    //return;
        return response()->json($peticiones);    
    }
}
