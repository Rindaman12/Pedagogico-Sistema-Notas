<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutosController;
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
    Route::get('/institutos/lista', [InstitutosController::class, 'index']);

    Route::post('/institutos/crear', [InstitutosController::class, 'ingresar']);

    Route::delete('/institutos/{id}', [InstitutosController::class, 'destroy']);

    Route::get('/institutos/encontrar/{id}', [InstitutosController::class, 'show']);

    Route::put('/institutos/{id}', [InstitutosController::class, 'update']);
});
