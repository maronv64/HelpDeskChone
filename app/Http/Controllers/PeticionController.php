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
   
    public function index()
    {
        //
        //return view('peticiones');
        return view('adminlte::layouts.partials.GestionPeticiones.peticiones');
    }

   
    public function create()
    {
        //
    }

    
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

    
    public function show( $request='')
    {
        $peticion    = Peticion::with('prioridad','estado','tipo_peticion','usuario')->findOrFail($request);
        return $peticion;
    }

   
    public function edit(Request $request )
    {
        //
        //return view('adminlte::layouts.partials.GestionPeticiones.modalPeticiones');
    }

    
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

    public function destroy($request='')
    {
        //
        $peticion = Peticion::findOrFail($request);
        $peticion->estado_del='0';
        $estado = Estado::where('descripcion','like',"%final%")->firstOrFail();
        $peticion->idestado=$estado->idestado;
        $peticion->update_at= Carbon::now()->toDateTimeString();
        $peticion->update();
    }

    //-------------------------------------------------------------------------------------------------------

    public function prueba_eliminar($request)
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

    public function datospeticion($id='')
    {
        $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where('idpeticion',$id)->get();//where('estado_del','1')->get();
        return response()->json($peticiones);    
    }

    public function peticionesFiltroAbmin($tipobusqueda='',Request $request)
    {
        //return response()->json($request);  
        if ($tipobusqueda=='Todas') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['estado_del','1'],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else 
        if ($tipobusqueda=='TipoPeticion') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['estado_del','1'],
                                                                                                ['idtipopeticion',$request->idtipopeticion],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);
        
        }else if ($tipobusqueda=='Prioridad') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['estado_del','1'],
                                                                                                ['idprioridad',$request->idprioridad],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else if ($tipobusqueda=='Estado') {
            # code...
            # code...                                          
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['estado_del','1'],
                                                                                                ['idestado',$request->idestado],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else if ($tipobusqueda=='Usuario') { 
            
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where('estado_del','1')
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            
            foreach ($peticiones as $peticion) {
                # code...
                 
                 if ($peticion->usuario->name==$request->username) {
                     # code...
                     //dd($peticion->usuario->name);
                     $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                         ['estado_del','1'],
                                                                                                         ['idusuario',$peticion->usuario->id]
                                                                                                         ])
                                                                                                 ->orderBy('created_at','desc')
                                                                                                 ->get();//where('estado_del','1')->get();
            
                 }
            }
            
            return response()->json($peticiones);
           
        }else if ($tipobusqueda=='Fecha') {
            # code...
            
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['estado_del','1'],
                                                                                                ['created_at','like',"%$request->created_at%"],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);
        }
        
       
    }


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

    public function peticionesFiltroNorm($tipobusqueda='',Request $request)
    {
        //return response()->json($request);  
        if ($tipobusqueda=='Todas') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['idusuario',$request->idusuario],
                                                                                                ['estado_del','1'],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else 
        if ($tipobusqueda=='TipoPeticion') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['idusuario',$request->idusuario],
                                                                                                ['estado_del','1'],
                                                                                                ['idtipopeticion',$request->idtipopeticion],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);
        
        }else if ($tipobusqueda=='Prioridad') {
            # code...
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['idusuario',$request->idusuario],
                                                                                                ['estado_del','1'],
                                                                                                ['idprioridad',$request->idprioridad],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else if ($tipobusqueda=='Estado') {
            # code...
            # code...                                          
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['idusuario',$request->idusuario],
                                                                                                ['estado_del','1'],
                                                                                                ['idestado',$request->idestado],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);

        }else if ($tipobusqueda=='Fecha') {
            # code...
            
            $peticiones = Peticion::with('prioridad','estado','tipo_peticion','usuario')->where([
                                                                                                ['idusuario',$request->idusuario],
                                                                                                ['estado_del','1'],
                                                                                                ['created_at','like',"%$request->created_at%"],
                                                                                                ['descripcion','like',"%$request->descripcion%"]
                                                                                                ])
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();//where('estado_del','1')->get();
            return response()->json($peticiones);
        }
        
       
    }



}
