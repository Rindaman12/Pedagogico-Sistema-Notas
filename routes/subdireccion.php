<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubdireccionController;
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
    Route::get('/subdireccion/inicio', [SubdireccionController::class, 'index']);

    Route::get('/subdireccion/listados', function () {
        $user = Auth::user();

        if ($user->tipo == 'subdireccion') {
            return view('subdireccion.listados');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    })->name('subdireccion.listados');
});
