<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
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
    Route::get('estudiante/inicio', [EstudianteController::class, 'index']);

    Route::get('estudiante/inscripcion', function () {
        $user = Auth::user();

        if ($user->tipo == 'estudiante') {
            return view('estudiante.inscripcion');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('estudiante.inscripcion');

    Route::get('/estudiante/constancia/inscripcion', function () {
        $user = Auth::user();

        if ($user->tipo == 'estudiante') {
            return view('estudiante.constancia_inscripcion');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('estudiante.constancia_inscripcion');

    Route::get('/estudiante/constancia/estudio', function () {
        $user = Auth::user();

        if ($user->tipo == 'estudiante') {
            return view('estudiante.constancia_estudio');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('estudiante.constancia_estudio');

    Route::get('/estudiante/record', function () {
        $user = Auth::user();

        if ($user->tipo == 'estudiante') {
            return view('estudiante.record');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('estudiante.record');
});
