<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Digiteca;
use Illuminate\Support\Facades\Auth;
use Validator;

class DigitecaController extends Controller
{

    public $successStatus = 200;

    public function index()
    {
        return Digiteca::all();
    }

    public function show(Digiteca $digiteca) {
        return $digiteca;
    }

    public function store(Request $request)
    {
        if (!$this->validarName($request)) {
            return response()->json('Error al crear nombre de digiteca.', 400);
        }

        if (!$this->validarWebSite($request)) {
            return response()->json('Error al crear sitio web de digiteca.', 400);
        }

        $request = $this->agregarHttp($request);

        $digiteca = Digiteca::create($request->all());
        return response()->json($digiteca, 201);
    }

    public function update(Request $request, Digiteca $digiteca)
    {
         if (!$this->validarName($request)) {
            return response()->json('Error al editar nombre de digiteca.', 400);
        }

        if (!$this->validarWebSite($request)) {
            return response()->json('Error al editar sitio web de digiteca.', 400);
        }
        
        if ($request->input('web_site')) {
            $request = $this->agregarHttp($request);
        }

        $digiteca->update($request->all());
        return response()->json($digiteca, 200);
    }

    public function delete(Digiteca $digiteca)
    {
        $digiteca->delete();
        return response()->json('Digiteca eliminada', 204);
    }

    public function validarName(Request $request)
    {
        $name = $request->input('name');
        if (!$name || !isset($name)) {
            return false;
        }
        return true;
    }

    public function validarWebSite(Request $request)
    {
        $web_site = $request->input('web_site');
        if (!$web_site || !isset($web_site)) {
            return false;
        }
        return true;
    }

    public function agregarHttp(Request $request)
    {
        $web_site = $request->input('web_site');
        if (!strpos($web_site, "http://")) {
            $request->merge(['web_site' => "http://" . $web_site]);
        }
        return $request;
    }
}
