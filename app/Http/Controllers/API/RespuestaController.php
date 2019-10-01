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

    public function store(Request $request)
    {
        //todo guardar respuestas
        //parametros recibidos:
        // user_id
        // cuestionario_id
        // cantidad respuestas amarillas
        // cantidad respuestas naranjas
        // cantidad respeustas rojas
        // semaforo activo
        // validaciones 
        if (!$this->validarUserId($request)) {
            return response()->json('Error al guardar la respuesta. Usuario inexistente.', 404);
        }

        if (!$this->validarCuestionarioId($request)) {
            return response()->json('Error al guardar la respuesta. Cuestionario no definido.', 404);
        }

        if (!$this->validarCantRespuestasAmarillas($request)) {
            return response()->json('Error al guardar la respuesta. Repuestas amarillas nulas', 404);
        }

        if (!$this->validarCantRespuestasNaranjas($request)) {
            return response()->json('Error al guardar la respuesta. Repuestas naranjas nulas.', 404);
        }

        if (!$this->validarCantRespuestasRojas($request)) {
            return response()->json('Error al guardar la respuesta. Repuestas rojas nulas', 404);
        }

        // guadar respuestas
        $respuesta = Respuesta::create($request->all());
        if ($respuesta) {
            return response()->json("Se ha guardado su respuesta con éxito!", 201);
        } else {
            return response()->json('Lo sentimos! No se ha podido guardar su respuesta.', 404);
        }
    }

    public function validarUserId(Request $request)
    {
        $user_id = $request->input('user_id');
        if (!$user_id || !isset($user_id)) {
            return false;
        }

        $user = \App\User::where('id', $user_id)->get();
        if (emptyArray($user)) {
            return true;
        }
        return false;
    }

    public function validarAverage(Request $request)
    {
        $average = $request->input('average');
        if (!$average || !isset($average)) {
            return false;
        }
        return true;
    }

    public function validarCentroAyudaId(Request $request)
    {
        $centro_ayuda_id = $request->input('centro_ayuda_id');
        if (!$centro_ayuda_id || !isset($centro_ayuda_id)) {
            return false;
        }

        $centroAyuda = \App\CentroAyuda::where('id', $centro_ayuda_id)->get();
        if (emptyArray($centroAyuda)) {
            return true;
        }
        return false;
    }
}
