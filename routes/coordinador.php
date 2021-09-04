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

    Route::get('/coordinador/constancia/incepcion', function () {
        $user = Auth::user();

        if ($user->tipo == 'coordinador') {
            return view('coordinador.constancia_incepcion');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('coordinador.constancia_incepcion');

    Route::get('/coordinador/listados', function () {
        $user = Auth::user();

        if ($user->tipo == 'coordinador') {
            return view('coordinador.listados');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('coordinador.listados');

    Route::get('/coordinador/record', function () {
        $user = Auth::user();

        if ($user->tipo == 'coordinador') {
            return view('coordinador.record');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('coordinador.record');
});
