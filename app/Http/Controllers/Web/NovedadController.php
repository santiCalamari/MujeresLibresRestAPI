<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Novedad;
use View;
use Illuminate\Support\Facades\DB;

class NovedadController extends Controller
{

    public function getAll()
    {
        $novedades = DB::table('novedads')->where('isNew', false)->where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->get();
        $totalData = $novedades->count();
        $data = array();
        foreach ($novedades as $novedad) {
            $nestedData = array();
            $nestedData['title'] = $novedad->title;
            $nestedData['date_at'] = $novedad->date_at;
            $data[] = $nestedData;
        }
        return view('web.layouts.novedades', compact('data'));
    }

    public function agregar(Novedad $novedad)
    {
        
    }

    public function editar(Request $request)
    {
        
    }

    public function eliminar(Request $request, Novedad $novedad)
    {
        
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
