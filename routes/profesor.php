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

    Route::get('/profesor/nomina', function () {
        $user = Auth::user();

        if ($user->tipo == 'profesor') {
            return view('profesor.nomina');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('profesor.nomina');

    Route::get('/profesor/carganotas', function () {
        $user = Auth::user();

        if ($user->tipo == 'profesor') {
            return view('profesor.carga_notas');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('profesor.carga_notas');
});
