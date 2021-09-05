<?php

use Illuminate\Support\Facades\Route;

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

//Archivo de rutas de Auth

Route::group([], __DIR__ . '/auth.php');

//Archivo de rutas de app

Route::group([], __DIR__ . '/app.php');

//Archivo de rutas de user

Route::group([], __DIR__ . '/user.php');

//Archivo de rutas de estudiante

Route::group([], __DIR__ . '/estudiante.php');

//Archivo de rutas de profesor

Route::group([], __DIR__ . '/profesor.php');

//Archivo de rutas de coordinador

Route::group([], __DIR__ . '/coordinadores/coordinador.php');

//Archivo de rutas de coordinador general

Route::group([], __DIR__ . '/coordinadores/coordinador_general.php');

//Archivo de rutas de secretaria

Route::group([], __DIR__ . '/coordinadores/secretaria.php');

//Archivo de rutas de subdireccion

Route::group([], __DIR__ . '/subdireccion.php');
