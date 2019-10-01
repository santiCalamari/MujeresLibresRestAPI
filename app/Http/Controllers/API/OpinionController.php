<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinion;
use App\CentroAyuda;
use Illuminate\Support\Facades\Auth;
use Validator;

class OpinionController extends Controller
{

    public $successStatus = 200;

    public function index($codigo)
    {
        $semilla = 'mujeres-dev';
        if ($semilla == $codigo) {
            return Opinion::all();
        }
        return response()->json($user, 401);
    }

    public function show($user_id, $centro_ayuda_id)
    {
        $user = Auth::user();
        if ($user->id != $user_id) {
            return response()->json($user, 401);
        }
        $opinion = Opinion::where('user_id', $user_id)->where('centro_ayuda_id', $centro_ayuda_id)->get();
        if (!$opinion->toArray()) {
            return response()->json('No se encontro opinion registrada para el centro de ayuda seleccionado.', 400);
        }
        return $opinion[0];
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
            return response()->json('Error al calificar un centro de ayuda. Centro de ayuda no definido.', 400);
        }

        if (!$this->validarAverage($request)) {
            return response()->json('Error. Debe ingresar una calificacion.', 400);
        }

        $opinion = Opinion::create($request->all());
        if ($this->updateCentroAyuda($request->input('centro_ayuda_id'), $request->input('average'))) {
            return response()->json($opinion, 201);
        } else {
            return response()->json('Error. No se encontro el centro de ayuda deseado.', 400);
        }
    }

//    public function update(Request $request, $centro_ayuda_id) {
//        if (!$this->validarUserId($request)) {
//            return response()->json('Error al calificar un centro de ayuda. Usuario inexistente.', 400);
//        }
//
//        if (!$this->validarCentroAyudaId($request)) {
//            return response()->json('Error al calificar un centro de ayuda. Centro de ayuda no definido o ya existente', 400);
//        }
//
//        if ($opinion = Opinion::where('user_id', $request->input('user_id'))->where('centro_ayuda_id', $centro_ayuda_id)->get()->toArray()) {
//            $opinion = new Opinion();
//            $opinion->newQuery();
//            $opinion->where('centro_ayuda_id', $centro_ayuda_id)->update($request->all());
//            if ($this->updateCentroAyuda($request->input('centro_ayuda_id'), $request->input('average'))) {
//                return response()->json($opinion, 201);
//            } else {
//                return response()->json('Error. Ya existe no se encontro el centro de ayuda.', 400);
//            }
//        } else {
//            return response()->json('Error al actulizar la opinion en el centro de ayuda', 500);
//        }
//    }
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

        $user = \App\User::where('id', $user_id)->get();
        if (emptyArray($user)) {
            return true;
        }
        return false;
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

    public function updateCentroAyuda($centro_ayuda_id, $average)
    {
        if ($centroAyuda = CentroAyuda::where('id', $centro_ayuda_id)->get()->toArray()) {
            $voters = $centroAyuda[0]['voters'];
            $general = (($centroAyuda[0]['average_general'] * $voters) + $average) / ($voters + 1);
            CentroAyuda::where('id', $centro_ayuda_id)->update(['voters' => $voters + 1, 'average_general' => $general]);
            return true;
        } else {
            return false;
        }
    }
}
