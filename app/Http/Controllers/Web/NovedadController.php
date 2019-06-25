<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Novedad;
use Illuminate\Support\Facades\Auth;
use Validator;

class NovedadController extends Controller
{

    public $successStatus = 200;

    //todo centroayuda, cuestionario. Ya estan hechas las capturas, volver a
    // hacerlas para sacar una imagen mejor

    public function index()
    {
        return "indexNov";
        $calendar = explode("-", $date);
        $dia = $calendar[0];
        $mes = $calendar[1];
        $anio = $calendar[2];
        $fecha = $anio . '-' . $mes . '-' . $dia;
        $novedad = Novedad::where('date_at', $fecha)->get();
        return $novedad;
    }

    public function getAll()
    {
        return "getAllNov";
        $novedad = Novedad::where('isNew', true)->where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->get();
        return $novedad;
    }

    public function show(Novedad $novedad)
    {
        return "showNov";
        return $novedad;
    }

    public function store(Request $request)
    {
        return "storeNov";
        if (!$this->validarIsNew($request)) {
            return response()->json('Error al crear la novedad.', 400);
        }

        if (!$this->validarTitle($request)) {
            return response()->json('Error. Debe ingresar un titulo', 400);
        }

        if (!$this->validarDateAt($request)) {
            return response()->json('Error. Debe ingresar un fecha de publicacion', 400);
        }

        if (!$this->validarDescription($request)) {
            return response()->json('Error. Debe ingresar una descripcion.', 400);
        }
        $fecha = explode("/", $request->input('date_at'));
        $dia = $fecha[0];
        $mes = $fecha[1];
        $anio = $fecha[2];
        $fecha = $mes . '/' . $dia . '/' . $anio;
        $request->merge([
            'date_at' => new \DateTime($fecha),
        ]);
        $novedad = Novedad::create($request->all());
        $novedad = Novedad::where('id', $novedad['attributes']['id'])->get();
        return response()->json($novedad[0], 201);
    }

    public function update(Request $request, Novedad $novedad)
    {
        return "updateNov";
        if (!$this->validarIsNew($request)) {
            return response()->json('Error al crear la novedad.', 400);
        }

        if (!$this->validarTitle($request)) {
            return response()->json('Error. Debe ingresar un titulo', 400);
        }

        if (!$this->validarDateAt($request)) {
            return response()->json('Error. Debe ingresar un fecha de publicacion', 400);
        }

        if (!$this->validarDescription($request)) {
            return response()->json('Error. Debe ingresar una descripcion.', 400);
        }
        $fecha = explode("/", $request->input('date_at'));
        $dia = $fecha[0];
        $mes = $fecha[1];
        $anio = $fecha[2];
        $fecha = $mes . '/' . $dia . '/' . $anio;
        $request->merge([
            'date_at' => new \DateTime($fecha),
        ]);
        $novedad->update($request->all());
        $novedad = Novedad::where('id', $novedad['attributes']['id'])->get();
        return response()->json($novedad[0], 201);
    }

    public function delete(Novedad $novedad)
    {
        return "deleteNov";
        $novedad->delete();
        return response()->json(null, 204);
    }

    public function validarTitle(Request $request)
    {
        return "validarTitleNov";
        $title = $request->input('titlte');
        if (!$title || !isset($title)) {
            return false;
        }
        return true;
    }

    public function validarDescription(Request $request)
    {
        return "validarDescriptionNov";
        $description = $request->input('description');
        if (!$description || !isset($description)) {
            return false;
        }
        return true;
    }

    public function validarDateAt(Request $request)
    {
        return "validarDateAtNov";
        $date_at = $request->input('date_at');
        if (!$date_at || !isset($date_at)) {
            return false;
        }
        return true;
    }

    public function validarIsNew(Request $request)
    {
        return "validarIsNewNov";
        $isNew = $request->input('isNew');
        if (!isset($isNew)) {
            return false;
        }
        return true;
    }
}
