<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Digiteca;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class DigitecaController extends Controller
{

    public function getAll()
    {
        $digitecas = Digiteca::all();
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
            return redirect()->route('agregar-digiteca', [$id])
                    ->with('mensaje_error', 'Error. Inserta un titulo.')
                    ->withInput();
        }

        if (!$this->validarWebSite($digitecadata['web_site'])) {
            return redirect()->route('agregar-digiteca', [$id])
                    ->with('mensaje_error', 'Error. Inserta un sitio de internet')
                    ->withInput();
        }

        $digitecadata['date_at'] = $this->agregarHttp($digitecadata['web_site']);


        Digiteca::create($digitecadata);
        return Redirect::to('informate');
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
                return redirect()->route('editar-digiteca', [$id])
                        ->with('mensaje_error', 'Error. Inserta un titulo.')
                        ->withInput();
            }

            if (!$this->validarWebSite($digitecadata['web_site'])) {
                return redirect()->route('editar-digiteca', [$id])
                        ->with('mensaje_error', 'Error. Inserta un sitio de internet')
                        ->withInput();
            }

            $digitecadata['web_site'] = $this->agregarHttp($digitecadata['web_site']);
            $digiteca = Digiteca::find($id);
            $digiteca->name = $digitecadata['name'];
            $digiteca->web_site = $digitecadata['web_site'];

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

    public function validarName($name)
    {
        if (!$name || !isset($name)) {
            return false;
        }
        return true;
    }

    public function validarWebSite($web_site)
    {
        if (!$web_site || !isset($web_site)) {
            return false;
        }
        return true;
    }

    public function agregarHttp($web_site)
    {
        if (strpos($web_site, "http://") === false) {
            $web_site = "http://" . $web_site;
        }
        return $web_site;
    }
}
