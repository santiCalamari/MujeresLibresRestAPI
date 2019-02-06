<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Favorito;
use Illuminate\Support\Facades\Auth;
use Validator;

class FavoritoController extends Controller {

    public $successStatus = 200;

//    public function index() {
//        return Favorito::all();
//    }

    public function show($user_id) {
        if ($favoritos = Favorito::where('user_id', $user_id)->get()->toArray()) {
            $centros_ayuda = array();
            foreach ($favoritos as $k => $fav) {
                $id_centro_ayuda = $fav['centro_ayuda_id'];
                if (!$centroAyuda = \App\CentroAyuda::where('id', $id_centro_ayuda)->get()->toArray()) {
                    return response()->json('Centro de ayuda no encontrado.', 400);
                }
                $centros_ayuda[] = $centroAyuda;
            }
            return $centros_ayuda;
        } else {
            return response()->json('Error al buscar favoritos para el usuario seleccionado', 400);
        }
    }

    public function store(Request $request) {
        if (!$this->validarUserId($request)) {
            return response()->json('Error al agregar a favoritos un centro de ayuda. Usuario inexistente.', 400);
        }

        if (!$this->validarCentroAyudaId($request)) {
            return response()->json('Error al agregar a favoritos un centro de ayuda. Centro de ayuda no definido o ya existente', 400);
        }
        $favorito = Favorito::create($request->all());
        return response()->json($favorito, 201);
    }

//    public function update(Request $request, Favorito $favorito)
//    {
//        $favorito->update($request->all());
//        return response()->json($favorito, 200);
//    }

    public function delete(Favorito $favorito) {
        $favorito->delete();
        return response()->json('Centro de ayuda eliminado de favoritos', 204);
    }

    public function validarUserId(Request $request) {
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

    public function validarCentroAyudaId(Request $request) {
        $centro_ayuda_id = $request->input('centro_ayuda_id');
        if (!$centro_ayuda_id || !isset($centro_ayuda_id)) {
            return false;
        }

        $opinion = \App\Opinion::where('centro_ayuda_id', $centro_ayuda_id)->get();
        if (emptyArray($opinion)) {
            return true;
        }
        return false;
    }

}