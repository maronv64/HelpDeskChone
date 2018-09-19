<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Peticion;
use App\Prioridad;
use App\TipoPeticion;
use App\User;
use App\Area;
use Carbon\Carbon;
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
        $peticion = new Peticion();
        $peticion->idprioridad = $request->idprioridad;
        $peticion->idestado = $request->idestado;
        $peticion->idtipopeticion = $request->idtipopeticion;
        $peticion->idusuario = $request->idusuario;
        $peticion->descripcion = $request->descripcion;
        $peticion->estado_del = '1';
        $peticion->created_at= Carbon::now()->toDateTimeString();
        if ($peticion->save()) {
            # code...
            return $peticion;
        }else{
            return 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */

    public function show( $request)
    {
        $peticion    = Peticion::with('prioridad','estado','tipo_peticion','usuario')->findOrFail($request);
        return $peticion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request )
    {
        //
        //return view('adminlte::layouts.partials.GestionPeticiones.modalPeticiones');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        $peticion = Peticion::findOrFail($request->idpeticion);
        $peticion->idprioridad = $request->idprioridad;
        $peticion->idestado = $request->idestado;
        $peticion->idtipopeticion = $request->idtipopeticion;
        $peticion->idusuario = $request->idusuario;
        $peticion->descripcion = $request->descripcion;
        $peticion->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */

    public function destroy($request)
    {
        $peticion = Peticion::findOrFail($request);
        $peticion->estado_del='0';
        //$estado = Estado::where('descripcion','like',"%finalizado%")->firstOrFail();
        $estado = Estado::where('descripcion',"Finalizado")->firstOrFail();
        $peticion->idestado=$estado->idestado;
        $peticion->update();
        return response()->json($peticion);
    }

    public function CargarDatos(){
        $peticiones = Peticion::where('estado_del','1')->get();
        $tipo_peticiones = TipoPeticion::all();
        $usuarios = User::all();
        $estados = Estado::all();
        $prioridades = Prioridad::all();
        $areas = Area::all();
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
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where('estado_del','1')
                                                                                    ->orderBy('created_at','desc')
                                                                                    ->get();//where('estado_del','1')->get();
        return response()->json($peticiones);
    }

    public function peticionesInsert(Request $request){
        $peticion = new Peticion();
        $peticion->idprioridad = $request->idprioridad;
        $peticion->idestado = $request->idestado;
        $peticion->idtipopeticion = $request->idtipopeticion;
        $peticion->idusuario = $request->idusuario;
        $peticion->descripcion = $request->descripcion;
        $peticion->estado_del = '1';
        if ($peticion->save()) {
            # code...
            return $peticion;
        }else{
            return 0;
        }
    }

<<<<<<< HEAD
    public function datospeticion($id){
=======


    public function datospeticion($id=''){
>>>>>>> b706f793aaffbca965a031531382969af2dcceb8
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where('idpeticion',$id)->get();//where('estado_del','1')->get();
//        $peticiones = Peticion::with('prioridad','estado','tipo_peticion')->get();//where('estado_del','1')->get();
        //dd($peticiones);
    //return;
        return response()->json($peticiones);    
    }
<<<<<<< HEAD
=======


//////////////////////////////////////////////Peticiones para usuarios normales//////////////////////////

    public function PNorm()
    {
        return view('adminlte::layouts.partials.GestionPeticiones.peticionesNorm');
    }

    public function mostrarMisPeticiones($id='')
    {
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                            ['idusuario',$id],
                                                                                            ['estado_del','1']
                                                                                            ])
                                                                                    ->orderBy('created_at','desc')
                                                                                    ->get();//where('estado_del','1')->get();
        return response()->json($peticiones);
    }




>>>>>>> b706f793aaffbca965a031531382969af2dcceb8
}
