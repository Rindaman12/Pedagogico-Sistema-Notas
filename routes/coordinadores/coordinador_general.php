<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorGeneralController;
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
    Route::get('/coordinador_general/inicio', [CoordinadorGeneralController::class, 'index']);

    Route::get('/coordinador_general/constancia/inscripcion', [CoordinadorGeneralController::class, 'index']);

    Route::get('/coordinador_general/listados', [CoordinadorGeneralController::class, 'index']);

    Route::get('/coordinador_general/record', [CoordinadorGeneralController::class, 'index']);
});
