<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Novedad;
use Illuminate\Support\Facades\Auth;
use Validator;

class NovedadController extends Controller
{

    public $successStatus = 200;

    // modificar para trae las noticias mas recientes
    public function index()
    {
        return Novedad::all();
    }

    public function show(Novedad $novedad)
    {
        return $novedad;
    }

    public function store(Request $request)
    {
        if (!$this->validarTitle($request)) {
            return response()->json('Error. Debe ingresar un titulo', 400);
        }

        if (!$this->validarDescription($request)) {
            return response()->json('Error. Debe ingresar una descripcion.', 400);
        }

        if (!$this->validarDateAt($request)) {
            return response()->json('Error. Debe ingresar un fecha de publicacion', 400);
        }

        if (!$this->validarIsNew($request)) {
            return response()->json('Error al crear la novedad.', 400);
        }

        $novedad = Novedad::create($request->all());
        return response()->json($novedad, 201);
    }

    public function update(Request $request, Novedad $novedad)
    {
        $novedad->update($request->all());
        return response()->json($novedad, 200);
    }

    public function delete(Novedad $novedad)
    {
        $novedad->delete();
        return response()->json(null, 204);
    }

    public function validarTitle(Request $request)
    {
        $title = $request->input('title');
        if (!$title || !isset($title)) {
            return false;
        }
        return true;
    }

    public function validarDescription(Request $request)
    {
        $description = $request->input('description');
        if (!$description || !isset($description)) {
            return false;
        }
        return true;
    }

    public function validarDateAt(Request $request)
    {
        $date_at = $request->input('date_at');
        if (!$date_at || !isset($date_at)) {
            return false;
        }
        return true;
    }

    public function validarIsNew(Request $request)
    {
        $isNew = $request->input('isNew');
        if (!$isNew || !isset($isNew)) {
            return false;
        }
        return true;
    }
}
