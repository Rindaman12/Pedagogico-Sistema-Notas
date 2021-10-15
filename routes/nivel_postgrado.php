<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelPostgradoController;
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
    Route::get('/nivel_postgrado/lista', [NivelPostgradoController::class, 'index']);

    Route::post('/nivel_postgrado/crear', [NivelPostgradoController::class, 'ingresar']);

    Route::delete('/nivel_postgrado/{id}', [NivelPostgradoController::class, 'destroy']);

    Route::get('/nivel_postgrado/encontrar/{id}', [NivelPostgradoController::class, 'show']);

    Route::put('/nivel_postgrado/{id}', [NivelPostgradoController::class, 'update']);
});
