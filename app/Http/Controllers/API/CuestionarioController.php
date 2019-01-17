<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cuestionario;
use Illuminate\Support\Facades\Auth;
use Validator;

class CuestionarioController extends Controller {

    public $successStatus = 200;
    
    // por ahora es uno solo, pero pueden ser mas
    public function index() {
        return Cuestionario::all();
    }

//    public function show(Cuestionario $cuestionario) {
//        return $cuestionario;
//    }

//    public function store(Request $request) {
//        $cuestionario = Cuestionario::create($request->all());
//        return response()->json($cuestionario, 201);
//    }

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
