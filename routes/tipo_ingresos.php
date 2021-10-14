<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoIngresoController;
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
    Route::get('/tipoIngresos/lista', [TipoIngresoController::class, 'index']);

    Route::post('/tipoIngresos/crear', [TipoIngresoController::class, 'ingresar']);

    Route::delete('/tipoIngresos/{id}', [TipoIngresoController::class, 'destroy']);

    Route::get('/tipoIngresos/encontrar/{id}', [TipoIngresoController::class, 'show']);

    Route::put('/tipoIngresos/{id}', [TipoIngresoController::class, 'update']);
});
