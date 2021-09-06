<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JefeControlController extends Controller
{
    /**
     * Show the application main.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //Muestra al usuario seleccionado en el dashboard

        $user = Auth::user();

        if ($user->tipo == 'jefe_control') {
            return view('controlestudio.jefe_control.inicio');
        } else {
            Session::flush();
            return redirect()->route('login');
        }
    }
}
