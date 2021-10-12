<?php

namespace App\Http\Controllers;

use App\Models\Instituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutosController extends Controller
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
        // Se muestra la listas de institutos

        $institutos = Instituto::get();

        return response()
            ->json(['institutos' => $institutos]);
    }

   
    public function destroy($id)
    {
        //Destruye el instituto seleccionado

        $instituto = Instituto::findOrFail($id);
        $instituto->delete();
    }

    public function show($id)
    {
        // Muestra el instituto seleccionado

        $instituto = Instituto::find($id);
        return response()->json($instituto);
    }

    public function ingresar(Request $request)
    {
        // Se crea un instituto


        //Se validan los campos de la DB

        $validator = Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'min:2', 'max:100', 'unique:institutos'],
            'direccion' => ['required', 'string', 'min:2', 'max:60'],
            'telefono' => ['required', 'string', 'min:2', 'max:20'],
            'fax_instituto' => ['required', 'string', 'min:2', 'max:20'],
            'email_instituto' => ['required', 'string', 'min:2', 'max:30','email'],
            'rif_instituto' => ['required', 'string', 'min:2', 'max:22'],
            'estado_instituto' => ['required', 'string', 'min:2', 'max:25'],


        ]);

        //Si hay un error lo muestra en formato json

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Se guardan los datos en la DB

        $instituto = Instituto::create([

            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'fax_instituto' => $request->fax_instituto,
            'email_instituto' => $request->email_instituto,
            'rif_instituto' => $request->rif_instituto,
            'estado_instituto' => $request->estado_instituto,

        ]);

        return $instituto;
    }

    public function update(Request $request, $id)
    {

     //Actualiza el instituto seleccionado

        $validator = Validator::make($request->all(), [
        'nombre' => ['required', 'string', 'min:2', 'max:100', 'unique:institutos'],
        'direccion' => ['required', 'string', 'min:2', 'max:60'],
        'telefono' => ['required', 'string', 'min:2', 'max:20'],
        'fax_instituto' => ['required', 'string', 'min:2', 'max:20'],
        'email_instituto' => ['required', 'string', 'min:2', 'max:30','email'],
        'rif_instituto' => ['required', 'string', 'min:2', 'max:22'],
        'estado_instituto' => ['required', 'string', 'min:2', 'max:25'],


    ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $instituto = Instituto::find($id)->update($request->all());

        return  $instituto;
    }
}
