<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Noticia;
use Illuminate\Support\Facades\Auth;
use Validator;

class NoticiaController extends Controller
{
    public $successStatus = 200;

    // ordeno por id y traigo los ultimos 12
    public function index()
    {
        return Noticia::orderBy('id','desc')->take(10)->get();
    }

    public function show(Noticia $noticia)
    {
        return $noticia;
    }
    
    // date_at: dd/mm/aaaa
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

        $noticia = Noticia::create($request->all());
        return response()->json($noticia, 201);
    }

    public function update(Request $request, Noticia $noticia)
    {
        $noticia->update($request->all());
        return response()->json($noticia, 200);
    }

    public function delete(Noticia $noticia)
    {
        $noticia->delete();
        return response()->json(null, 204);
    }

    public function validarTitle(Request $request)
    {
        $title = $request->input('titlte');
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
}
