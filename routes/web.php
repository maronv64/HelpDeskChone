<?php
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/probando', function () {
    return view('probando');
});

//rutas para dispositivos
Route::resource('/dispositivos','DispositivosController');
Route::get('/obtenerDispositivos','DispositivosController@obtenerlista');
Route::get('/obtenerDispositivos/{id?}','DispositivosController@buscarDispositivo');

//rutas para asignacion de dispositivos
Route::resource('/asignacionDispositivos','AsignacionDispositivosController');
Route::get('/consultar_dispositivos_disponibles','DispositivosController@consultar_dispositivos_disponibles');
Route::get('/consultar_dispositivos_de_usuario/{id}','DispositivosController@consultar_dispositivos_de_usuario');
Route::delete('/eliminar_dispositivos_asignados/{id}','AsignacionDispositivosController@eliminar_dispositivos_asignados');

//la plantilla hace uso de estas rutas
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//Rutas de Maron Vera ------------------------------------------------------------------------------------------------
//holaaaaaa  nonnooooooooo maron 

Route::get('/prueba_eliminar/{id?}','PeticionController@prueba_eliminar');

//Rutas de las Peticiones
Route::resource('/peticiones','PeticionController');
//Route::post('/peticionesInsert','PeticionController@peticionesInsert');

//Rutas para consumo de datos de Peticiones 
//Consultas Generales
Route::get('/peticionesCargarDatos','PeticionController@CargarDatos');
Route::get('/peticionesCargarDatos2','PeticionController@CargarDatos2');
Route::get('/datospeticion/{id?}','PeticionController@datospeticion');
Route::get('/peticionesFiltroAbmin/{consul?}/{datos?}','PeticionController@peticionesFiltroAbmin');
Route::get('/peticionesFiltroNorm/{consul?}/{datos?}','PeticionController@peticionesFiltroNorm');//peticionesFiltroNorm
//Consultas de las Peticiones de Cada Usuario
//index
Route::get('/peticionesNorm','PeticionController@PNorm');
//Rutas para consumo de datos de Peticiones 
Route::get('/peticionesNormCargarDatos/{id?}','PeticionController@mostrarMisPeticiones');


//Rutas de Prioridad
//Cargar todos las Priotidades
Route::get('/prioridadesCargarDatos','PrioridadController@CargarDatos');
//Rutas de Estado
//Cargar todos los Estados
Route::get('/estadosCargarDatos','EstadoController@CargarDatos');
//Ruetas de Tipo Peticiones
//Cargar todos los tipos de Peticiones
Route::get('/tipopeticionesCargarDatos','TipoPeticionController@CargarDatos');
//Rutas de Usuario
Route::get('/usuarioBuscar/{id?}','UsuariosController@usuarioBuscar');
//Cargar todos los Usuarios por Areas
Route::get('/usuariosFiltroPorArea/{id?}/{consulta?}','UsuariosController@usuariosFiltroPorArea');
//Rutas de Areas
//Cargar todos los Areas
Route::get('/areasCargarDatos','AreaController@CargarDatos');

//---------------------------------------------------------------------------------------------------------------------

//GP

Route::get('/dashboardhelpdesk','DashboardHelpdeskController@index');
/*###################*GESTIONES DE USUARIOS*###########################*/

/*###################*GESTIONES DE USUARIOS de leonardo*###########################*/

/*RUTA PARA HACER USO DE LOS CONTROLADORES DE USUARIOS*/
Route::resource('/GestionUsuarios', 'UsuariosController');
Route::GET('/usuariosMostrar', 'UsuariosController@listadeUsuarios');
Route::GET('/prepararactualizar/{id}', 'UsuariosController@preparactualizar');
Route::get('/buscar_usuarios/{busqueda?}','UsuariosController@buscar_usuarios');
Route::get('/eliminarusuario/{id?}','UsuariosController@eliminarusuario');
Route::get('/listaTecnicos','UsuariosController@listaTecnicos');

/*###################*GESTIONES DE TIPO USUARIOS*###########################*/
Route::GET('/mostrartiposusuarios', 'TipoUsuarioController@mostrartiposusuarios');
Route::GET('/mostrarextratecnico', 'ExtraTecnicoController@mostrarextratecnico');


/*######################RUTAS PARA LAS AREAS#################################*/
Route::GET('/mostrarareas', 'AreaController@mostrarareas');

/*######################RUTAS PARA LOS TÉCNICOS#################################*/
Route::resource('/extratecnico', 'ExtraTecnicoController');

/*######################RUTAS PARA  LA ESPECIALIDAD#################################*/
Route::get('/mostrarespecialidad','EspecialidadController@mostrarespecialidad');


/*######################RUTAS PARA LA ASIGNACIÓN DE TAREAS#################################*/
Route::resource('/asigtareas','AsigTareasController');
Route::post('/guardarUsuariosAsignacion/{idusuario}/{idasig}','AsigTareasController@guardarUsuariosAsignacion');
Route::get('/mostrarasignaciones/{idpeticion}','AsigTareasController@mostrarasignaciones');


Route::GET('/desencriptarclave', 'UsuariosController@desencriptarclave');
Route::get('/mostrarobservacion/{idasignacion}','AsigTareasController@mostrarobservacion');
Route::get('/consultarPeticionEstado/{idusuario}','AsigTareasController@consultarPeticionEstado');
Route::get('/misasignaciones','AsigTareasController@misasignaciones');
Route::get('/idususario','AsigTareasController@idususario');


//Rutas de tipo de usuarios
//Route::resource('/TipoUsuarios','TipoUsuariosController');
Route::post('/tiposdeusuarios','TipoUsuarioController@store');
Route::get('/TipoUsuarios', function () {
    return view('adminlte::layouts.partials.PanelConfiguracion.PanelConfig');
});

/*######################RUTAS PARA LOS TIPOS DE DISPOSITIVOS#################################*/
Route::post('/tiposdispositivos','TipoDispositivoController@store');
Route::get('/mostrartiposdispositivos','TipoDispositivoController@mostrardispositivos');


//view('adminlte::layouts.partials.PanelConfiguracion.PanelConfig')

