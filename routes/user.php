<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

    Route::get('estudiante/inicio', function () {
        return view('estudiante.inicio');
    });

    Route::get('profesor/inicio', function () {
        return view('profesor.inicio');
    });

    Route::get('/find/user', [UserController::class, 'findUser']);
});
