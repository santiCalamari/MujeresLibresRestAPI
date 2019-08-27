<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Respuesta;

class RespuestaController extends Controller
{

    public $successStatus = 200;

    public function index($codigo)
    {
        $semilla = 'mujeres-dev';
        if ($semilla == $codigo) {
            return Respuesta::all();
        }
        return response()->json($user, 401);
    }

//    public function show(Cuestionario $cuestionario) {
//        return $cuestionario;
//    }

    public function store(Request $request)
    {
        //todo guardar respuestas
    }
//
//    public function update(Request $request, Cuestionario $cuestionario) {
//        $cuestionario->update($request->all());
//        return response()->json($cuestionario, 200);
//    }
//
//    public function delete(Cuestionario $cuestionario) {
//        $cuestionario->delete();
//        return response()->json('Cuestionario eliminada', 204);
//    }
}
