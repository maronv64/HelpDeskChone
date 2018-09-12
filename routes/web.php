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
//rutas para tipo de dispositivos

//la plantilla hace uso de estas rutas
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//Rutas de Maron Vera
//holaaaaaa
Route::resource('/peticiones','PeticionController');
Route::get('/peticionesCargarDatos','PeticionController@CargarDatos');
Route::get('/peticionesCargarDatos2','PeticionController@CargarDatos2');
