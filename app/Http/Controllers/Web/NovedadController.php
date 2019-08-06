<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Novedad;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NovedadController extends Controller
{

    public function getAll()
    {
//        $novedades = Novedad::where('isNew', false)->where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->paginate(10);

        $novedad['date_at'] = "2019-08-06";
        $novedad['title'] = "una descrpcion";
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        $novedades[] = $novedad;
        return view('web.layouts.novedades', compact('novedades'));
    }

    public function agregarEvento()
    {
//todo cambiar de lugar
        return View::make('web.layouts.agregar-evento');
        if (Auth::check()) {
            return View::make('web.layouts.agregar-evento');
        }
        return Redirect::to('/');
    }

    public function agregarEfemeride()
    {
//todo cambiar de lugar        
        return View::make('web.layouts.agregar-efemeride');
        if (Auth::check()) {
            
        }
        return Redirect::to('/');
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
