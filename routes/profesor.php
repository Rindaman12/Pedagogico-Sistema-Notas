<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
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
    Route::get('profesor/inicio', [ProfesorController::class, 'index']);

    Route::get('/profesor/nomina', [ProfesorController::class, 'index']);


    Route::get('/profesor/carganotas', [ProfesorController::class, 'index']);
});
