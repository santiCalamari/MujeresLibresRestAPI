<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinion;
use Illuminate\Support\Facades\Auth;
use Validator;

class OpinionController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return Opinion::all();
//    }

    public function show($centro_ayuda_id)
    {
        $opinion = new Opinion();
        $opinion->newQuery();
        $opinion->where('id', $centro_ayuda_id)->get();

        if (!$opinion) {
            return response()->json('No se encontro opinion registrada para el centro de ayuda seleccionado.', 400);
        }
        return $opinion->get();
    }

    public function store(Request $request)
    {
        if (!$this->validarName($request)) {
            return response()->json('Error al calificar un centro de ayuda.', 400);
        }

        if (!$this->validarUserId($request)) {
            return response()->json('Error al calificar un centro de ayuda. Usuario inexistente.', 400);
        }

        if (!$this->validarCentroAyudaId($request)) {
            return response()->json('Error al calificar un centro de ayuda. Centro de ayuda no definido o ya existente', 400);
        }

        if (!$this->validarAverage($request)) {
            return response()->json('Error. Debe ingresar una calificacion.', 400);
        }

        $opinion = Opinion::create($request->all());
        return response()->json($opinion, 201);
    }

    public function update(Request $request, $centro_ayuda_id)
    {
        $opinion = new Opinion();
        $opinion->newQuery();
        $opinion->where('centro_ayuda_id', $centro_ayuda_id)->update($request->all());

        return response()->json($opinion, 200);
    }

//    public function delete(Opinion $opinion) {
//        $opinion->delete();
//        return response()->json('Opinion eliminada', 204);
//    }

    public function validarName(Request $request)
    {
        $name = $request->input('name');
        if (!$name || !isset($name)) {
            return false;
        }
        return true;
    }

    public function validarAverage(Request $request)
    {
        $average = $request->input('average');
        if (!$average || !isset($average)) {
            return false;
        }
        return true;
    }

    public function validarUserId(Request $request)
    {
        $user_id = $request->input('user_id');
        if (!$user_id || !isset($user_id)) {
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

        $opinion = new Opinion();
        $opinion->newQuery();
        $opinion->where('centro_ayuda_id', $request->input());

        if ($opinion->get()) {
            return false;
        }

        return true;
    }
}
