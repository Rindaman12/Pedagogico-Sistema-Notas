<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
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
    Route::get('coordinador/inicio', [CoordinadorController::class, 'index']);

    Route::get('/coordinador/constancia/incepcion', [CoordinadorController::class, 'index']);

    Route::get('/coordinador/listados', [CoordinadorController::class, 'index']);

    Route::get('/coordinador/record', [CoordinadorController::class, 'index']);
});
