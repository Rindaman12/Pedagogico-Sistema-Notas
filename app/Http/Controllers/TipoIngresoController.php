<?php

namespace App\Http\Controllers;

use App\Models\TipoIngreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoIngresoController extends Controller
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
        // Se muestra la lista de tipo de ingreso

        $tipoingresos = TipoIngreso::get();

        return response()
            ->json(['tipoingresos' => $tipoingresos]);
    }

   
    public function destroy($id)
    {
        //Destruye el tipo ingresos seleccionado

        $tipoingreso = TipoIngreso::findOrFail($id);
        $tipoingreso->delete();
    }

    public function show($id)
    {
        // Muestra el TipoIngreso seleccionado

        $tipoingreso = TipoIngreso::find($id);
        return response()->json($tipoingreso);
    }

    public function ingresar(Request $request)
    {
        // Se crea un TipoIngreso


        //Se validan los campos de la DB

        $validator = Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'min:2', 'max:100', 'unique:tipo_ingreso'],
        ]);

        //Si hay un error lo muestra en formato json

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Se guardan los datos en la DB

        $tipoingreso = TipoIngreso::create([

            'nombre' => $request->nombre,
        ]);

        return  $tipoingreso;
    }

    public function update(Request $request, $id)
    {

     //Actualiza el TipoIngreso seleccionado

        $validator = Validator::make($request->all(), [
        'nombre' => ['required', 'string', 'min:2', 'max:100', 'unique:tipo_ingreso'],
    ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $tipoingreso = TipoIngreso::find($id)->update($request->all());

        return   $tipoingreso;
    }
}
