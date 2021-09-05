<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretariaController;
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
    Route::get('/secretaria/inicio', [SecretariaController::class, 'index']);

    Route::get('/secretaria/carga_oferta/', function () {
        $user = Auth::user();

        if ($user->tipo == 'secretaria') {
            return view('coordinador.secretaria.carga_oferta');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('coordinador.secretaria.carga_oferta');

    Route::get('/secretaria/listados', function () {
        $user = Auth::user();

        if ($user->tipo == 'secretaria') {
            return view('coordinador.secretaria.listados');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('coordinador.secretaria.listados');
});
