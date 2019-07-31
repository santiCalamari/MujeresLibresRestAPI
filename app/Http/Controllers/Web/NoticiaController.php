<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Noticia;
use Illuminate\Support\Facades\Auth;
use Validator;

class NoticiaController extends Controller {

    public function getAll() {
        $noticias = DB::table('noticias')->where('isNew', true)->where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->get();
        dd($noticias);
        return $noticias;
    }

    public function agregar(Novedad $novedad) {
        
    }

    public function editar(Request $request) {
        
    }

    public function eliminar(Request $request, Novedad $novedad) {
        
    }

    public function validarTitle(Request $request) {
        return "validarTitleN";
        $title = $request->input('titlte');
        if (!$title || !isset($title)) {
            return false;
        }
        return true;
    }

    public function validarDescription(Request $request) {
        return "validarDescriptionN";
        $description = $request->input('description');
        if (!$description || !isset($description)) {
            return false;
        }
        return true;
    }

    public function validarDateAt(Request $request) {
        return "validarDateAtN";
        $date_at = $request->input('date_at');
        if (!$date_at || !isset($date_at)) {
            return false;
        }
        return true;
    }

}
