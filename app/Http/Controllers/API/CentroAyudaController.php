<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CentroAyuda;
use Illuminate\Support\Facades\Auth;
use Validator;

class CentroAyudaController extends Controller {

    public $successStatus = 200;

//    public function index() {
//        return CentroAyuda::all();
//    }
    // mis centro de ayuda, los que son mis favoritos
    public function show($user_id) {
        $misCentrosAyuda = new CentroAyuda();
        $misCentrosAyuda->newQuery();
        $misCentrosAyuda->where('user_id', $user_id);

        return $misCentrosAyuda->get();
    }

    // la aplicacion agrega a favoritos el centro de ayuda para ese usuario
    public function store(Request $request) {
        if (!$this->validarName($request)) {
            return response()->json('Error al calificar un centro de ayuda.', 400);
        }

        if (!$this->validarAverageGeneral($request)) {
            return response()->json('Error. Debe ingresar una calificacionn.', 400);
        }

        if (!$this->validarVoters($request)) {
            return response()->json('Error. Debe ingresar una calificacion.', 400);
        }

        $centroAyuda = CentroAyuda::create($request->all());
        return response()->json($centroAyuda, 201);
    }

    // actualiza las calificaciones generales de un centro de ayuda
    public function update(Request $request, CentroAyuda $centroAyuda) {
        if (!$this->validarAverageGeneral($request)) {
            return response()->json('Error al guardar la calificacion.', 400);
        }

        if (!$this->validarVoters($request)) {
            return response()->json('Error al guardar el usuario votante.', 400);
        }

        $centroAyuda->update($request->all());
        return response()->json($centroAyuda, 200);
    }

    // borrar de favoritos
    public function delete(CentroAyuda $centroAyuda) {
        $centroAyuda->delete();
        return response()->json('CentroAyuda eliminada', 204);
    }

    public function validarName(Request $request) {
        $name = $request->input('name');
        if (!$name || !isset($name)) {
            return false;
        }
        return true;
    }

    public function validarAverageGeneral(Request $request) {
        $average_general = $request->input('average_general');
        if (!isset($average_general)) {
            return false;
        }
        return true;
    }

    public function validarVoters(Request $request) {
        $voters = $request->input('voters');
        if (!isset($voters)) {
            return false;
        }
        return true;
    }

}
