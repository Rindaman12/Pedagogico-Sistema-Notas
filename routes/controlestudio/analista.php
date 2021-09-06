<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalistaController;
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
    Route::get('/analista/inicio', [AnalistaController::class, 'index']);

    Route::get('/analista/CMDatosPersonales/', [AnalistaController::class, 'index']);

    Route::get('/analista/carga_acreditacion/', [AnalistaController::class, 'index']);

    Route::get('/analista/CCNCI/', [AnalistaController::class, 'index']);

    Route::get('/analista/inscripcion/', [AnalistaController::class, 'index']);

    Route::get('/analista/revision_expedientes/', [AnalistaController::class, 'index']);

    Route::get('/analista/record', [AnalistaController::class, 'index']);

    Route::get('/analista/listados', [AnalistaController::class, 'index']);
});
