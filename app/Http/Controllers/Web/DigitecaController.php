<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Digiteca;

class DigitecaController extends Controller
{

    public function getAll()
    {
        $digitecas = Digiteca::paginate(10);
        return view('web.layouts.informate', compact('digitecas'));
    }

    public function showAgregarDigiteca()
    {
        if (Auth::check()) {
            return View::make('web.layouts.agregar-digiteca');
        }
        return Redirect::to('/');
    }

    public function agregarDigiteca()
    {
        $digitecadata = array(
            'name' => Input::get('name'),
            'web_site' => Input::get('web_site')
        );

        if (!$this->validarName($digitecadata['name'])) {
            return Redirect::to('agregar-digiteca')
                    ->with('mensaje_error', 'Error. Inserte un nombre.')
                    ->withInput();
        }

        if (!$this->validarWebSite($digitecadata['web_site'])) {
            return Redirect::to('agregar-digiteca')
                    ->with('mensaje_error', 'Error. Inserte un sitio web.')
                    ->withInput();
        }

        if (!$this->agregarHttp($digitecadata['web_site'])) {
            return Redirect::to('agregar-digiteca')
                    ->with('mensaje_error', 'Error. Inserte con formato *****.')
                    ->withInput();
        }

        Digiteca::create($digitecadata);
        return Redirect::to('informate');
    }

    public function verDigiteca($id)
    {
        $digiteca = Digiteca::find($id);
        return View::make('web.layouts.ver-digiteca')->with('digiteca', $digiteca);
    }

    public function showEditarDigiteca($id)
    {
        if (Auth::check()) {
            $digiteca = Digiteca::find($id);
            return View::make('web.layouts.editar-digiteca')->with('digiteca', $digiteca);
        }
        return Redirect::to('/');
    }

    public function editarDigiteca($id)
    {
        if (Auth::check()) {
            $digitecadata = array(
                'name' => Input::get('name'),
                'web_site' => Input::get('web_site')
            );

            if (!$this->validarName($digitecadata['name'])) {
                return Redirect::to('agregar-digiteca')
                        ->with('mensaje_error', 'Error. Inserte un nombre.')
                        ->withInput();
            }

            if (!$this->validarWebSite($digitecadata['web_site'])) {
                return Redirect::to('agregar-digiteca')
                        ->with('mensaje_error', 'Error. Inserte un sitio web.')
                        ->withInput();
            }

            if (!$this->agregarHttp($digitecadata['web_site'])) {
                return Redirect::to('agregar-digiteca')
                        ->with('mensaje_error', 'Error. Inserte con formato *****.')
                        ->withInput();
            }

            $digiteca = Novedad::find($id);
            $digiteca->title = $digitecadata['name'];
            $digiteca->date_at = $digitecadata['web_site'];

            $digiteca->save();
            return Redirect::to('informate');
        }
        return Redirect::to('/');
    }

    public function eliminar($id)
    {
        $digiteca = Digiteca::find($id);
        $digiteca->delete();
        return Redirect::to('informate');
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
