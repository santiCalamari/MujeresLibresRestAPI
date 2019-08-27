<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consulta;
use Illuminate\Support\Facades\Auth;
use Validator;

class ConsultaController extends Controller
{

    public $successStatus = 200;

    // por ahora es uno solo, pero pueden ser mas
    public function index($codigo)
    {
        $semilla = 'mujeres-dev';
        if ($semilla == $codigo) {
            return Consulta::all();
        }
        return response()->json($user, 401);
    }

    public function enviarConsulta(Request $request)
    {
        if ($request->input('name') == null) {
            return response()->json(['error' => 'Ingrese un nombre'], 403);
        }
        if ($request->input('forma_contacto') == null) {
            return response()->json(['error' => 'Ingrese una forma de contacto'], 403);
        }
        if ($request->input('subject') == null) {
            return response()->json(['error' => 'Ingrese un asunto'], 403);
        }
        if ($request->input('description') == null) {
            return response()->json(['error' => 'Ingrese una description'], 403);
        }

        try {
            $obj = new \stdClass();
            $obj->nombre = $request->input('name');
            $obj->forma_contacto = $request->input('forma_contacto');
            $obj->subject = $request->input('subject');
            $obj->description = $request->input('description');
            Mail::to("muejereslibressfc@gmail.com")->send(new enviarConsulta($obj));
            return response()->json("Se ha enviado su consulta al Area Mujer y Diversidad Sexual.");
        } catch (Exception $ex) {
            return response()->json("Hubo un error al enviar su consulta. Intente nuevamente mas tarde!", 403);
        }
    }
}
