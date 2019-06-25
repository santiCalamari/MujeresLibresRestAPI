<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CentroAyuda;
use Illuminate\Support\Facades\Auth;
use Validator;

class CentroAyudaController extends Controller
{

    public $successStatus = 200;

//    public function index() {
//        return CentroAyuda::all();
//    }

    
    public function show() {
        return "showCA";
        return CentroAyuda::where('id', $centro_ayuda_id)->get();        
    }

//        public function store(Request $request) {
//        $centroAyuda = CentroAyuda::create($request->all());
//        return response()->json($centroAyuda, 201);
//    }

    
    public function update(Request $request, CentroAyuda $centroAyuda)
    {
        return "updateCA";
        if (!$this->validarAverageGeneral($request)) {
            return response()->json('Error al guardar la calificacion.', 400);
        }

        if (!$this->validarVoters($request)) {
            return response()->json('Error al guardar el usuario votante.', 400);
        }

        $centroAyuda->update($request->all());
        return response()->json($centroAyuda, 200);
    }

//    public function delete(CentroAyuda $centroAyuda) {
//        $centroAyuda->delete();
//        return response()->json('CentroAyuda eliminada', 204);
//    }

    public function validarAverageGeneral(Request $request)
    {
        return "validarAverageGeneralCA";
        $average_general = $request->input('average_general');
        if (!isset($average_general)) {
            return false;
        }
        return true;
    }

    public function validarVoters(Request $request)
    {
        return "validarVotersCA";
        $voters = $request->input('voters');
        if (!isset($voters)) {
            return false;
        }
        return true;
    }
}
