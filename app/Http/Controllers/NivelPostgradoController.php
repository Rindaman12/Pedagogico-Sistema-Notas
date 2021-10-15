<?php

namespace App\Http\Controllers;

use App\Models\NivelPostgrado;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NivelPostgradoController extends Controller
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

        $nivel_postgrados = NivelPostgrado::get();

        return response()
            ->json(['nivel_postgrados' => $nivel_postgrados]);
    }

   
    public function destroy($id)
    {
        //Destruye el tipo ingresos seleccionado

        $nivel_postgrado = NivelPostgrado::findOrFail($id);
        $nivel_postgrado->delete();
    }

    public function show($id)
    {
        // Muestra el TipoIngreso seleccionado

        $nivel_postgrado = NivelPostgrado::find($id);
        return response()->json($nivel_postgrado);
    }

    public function ingresar(Request $request)
    {
        // Se crea un TipoIngreso


        //Se validan los campos de la DB

        $validator = Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'min:2', 'max:100', 'unique:nivel_postgrado'],
        ]);

        //Si hay un error lo muestra en formato json

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Se guardan los datos en la DB

        $nivel_postgrado = NivelPostgrado::create([

            'nombre' => $request->nombre,
        ]);

        return $nivel_postgrado;
    }

    public function update(Request $request, $id)
    {

     //Actualiza el TipoIngreso seleccionado

        $validator = Validator::make($request->all(), [
        'nombre' => ['required', 'string', 'min:2', 'max:100', Rule::unique('nivel_postgrado')->ignore($id)],
    ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $nivel_postgrado = NivelPostgrado::find($id)->update($request->all());

        return $nivel_postgrado;
    }
}
