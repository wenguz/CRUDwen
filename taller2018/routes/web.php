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
    return view('usuario.create');
});

//definision de ruta para Usuarios despues de haber cerado el controlador
Route::resource('users', 'ControllerUsers');


//ruta para el listado de usuario. Se definio con get porque no era una funsion por defecto del controlador.
Route::get('/list','ControllerUsers@list');



