<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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



Route::group(['middleware' => 'auth'], function () {
    Route::get('estudiante/inicio', [EstudianteController::class, 'index']);

    Route::get('estudiante/inscripcion', [EstudianteController::class, 'index']);


    Route::get('/estudiante/constancia/inscripcion', [EstudianteController::class, 'index']);


    Route::get('/estudiante/constancia/estudio', [EstudianteController::class, 'index']);


    Route::get('/estudiante/record', [EstudianteController::class, 'index']);
});
