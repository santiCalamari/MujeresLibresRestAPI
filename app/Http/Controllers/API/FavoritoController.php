<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Favorito;
use Illuminate\Support\Facades\Auth;
use Validator;

class FavoritoController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return Favorito::all();
//    }

    public function show($user_id)
    {
        $centroAyuda = new \App\CentroAyuda();
        $centroAyuda->newQuery();
        $centroAyuda->where('user_id', $user_id)->get();

        if (!$centroAyuda) {
            return response()->json('No existen centros de ayuda en favoritos', 400);
        }
        return $centroAyuda->get();
    }

    public function store(Request $request)
    {
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

    public function delete(Favorito $favorito)
    {
        $favorito->delete();
        return response()->json('Centro de ayuda eliminado de favoritos', 204);
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
