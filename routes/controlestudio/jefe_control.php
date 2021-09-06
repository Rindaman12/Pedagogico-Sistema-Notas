<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JefeControlController;
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
    Route::get('/jefe_control/inicio', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/CMDatosPersonales/', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/carga_acreditacion/', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/CCNCI/', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/inscripcion/', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/revision_expedientes/', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/record', [JefeControlController::class, 'index']);

    Route::get('/jefe_control/listados', [JefeControlController::class, 'index']);
    
    Route::get('/jefe_control/modificacion_calificaciones', [JefeControlController::class, 'index']);
});
