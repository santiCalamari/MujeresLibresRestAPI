<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pregunta;
use Illuminate\Support\Facades\Auth;
use Validator;

class PreguntaController extends Controller {

    public $successStatus = 200;

    public function index() {
        return Pregunta::all();
    }

    //obtiene todas las preguntas para un cuestionario
    public function show($cuestionario_id) {
        $pregunta = Pregunta::where('cuestionario_id', $cuestionario_id)->get();
        return $pregunta;
    }

//    public function store(Request $request) {
//        $pregunta = Pregunta::create($request->all());
//        return response()->json($pregunta, 201);
//    }
//
//    public function update(Request $request, Pregunta $pregunta) {
//        $pregunta->update($request->all());
//        return response()->json($pregunta, 200);
//    }
//
//    public function delete(Pregunta $pregunta) {
//        $pregunta->delete();
//        return response()->json('Pregunta eliminada', 204);
//    }
}
