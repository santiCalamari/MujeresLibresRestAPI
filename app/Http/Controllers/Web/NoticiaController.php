<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Noticia;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{

    public function getAll()
    {
        $noticias = Noticia::where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->paginate(10);
        return view('web.layouts.noticias', compact('noticias'));
    }

    public function showAgregarNoticia()
    {
        if (Auth::check()) {
            return View::make('web.layouts.agregar-noticia');
        }
        return Redirect::to('/');
    }

    public function agregarNoticia()
    {
        $noticiadata = array(
            'title' => Input::get('title'),
            'date_at' => Input::get('date_at'),
            'address' => Input::get('address'),
            'description' => Input::get('description')
        );

        if (!$this->validarTitle($noticiadata['title'])) {
            return Redirect::to('agregar-noticia')
                    ->with('mensaje_error', 'Error. Inserte un titulo.')
                    ->withInput();
        }

        if (!$this->validarDateAt($noticiadata['date_at'])) {
            return Redirect::to('agregar-noticia')
                    ->with('mensaje_error', 'Error. Inserta una fecha.')
                    ->withInput();
        }

        if (!$this->validarDescription($noticiadata['description'])) {
            return Redirect::to('agregar-noticia')
                    ->with('mensaje_error', 'Error. Inserta una descripcion.')
                    ->withInput();
        }

        Noticia::create($noticiadata);
        return Redirect::to('listado-noticias');
    }

    public function verNoticia($id)
    {
        $noticia = Noticia::find($id);
        return View::make('web.layouts.ver-noticia')->with('noticia', $noticia);
    }

    public function showEditarNoticia($id)
    {
        if (Auth::check()) {
            $noticia = Noticia::find($id);
            return View::make('web.layouts.editar-noticia')->with('noticia', $noticia);
        }
        return Redirect::to('/');
    }

    public function editarNoticia($id)
    {
        if (Auth::check()) {
            $noticiadata = array(
                'title' => Input::get('title'),
                'date_at' => Input::get('date_at'),
                'address' => Input::get('address'),
                'description' => Input::get('description')
            );

            if (!$this->validarTitle($noticiadata['title'])) {
                return redirect()->route('editar-noticia', [$id])
                        ->with('mensaje_error', 'Error. Inserta un titulo.')
                        ->withInput();
            }

            if (!$this->validarDateAt($noticiadata['date_at'])) {
                return redirect()->route('editar-noticia', [$id])
                        ->with('mensaje_error', 'Error. Inserta una fecha.')
                        ->withInput();
            }

            if (!$this->validarDescription($noticiadata['description'])) {
                return redirect()->route('editar-noticia', [$id])
                        ->with('mensaje_error', 'Error. Inserta una descripcion.')
                        ->withInput();
            }

            $noticia = Noticia::find($id);
            $noticia->title = $noticiadata['title'];
            $noticia->date_at = $noticiadata['date_at'];
            $noticia->description = $noticiadata['description'];

            if (!empty($noticiadata['address'])) {
                $noticia->address = $noticiadata['address'];
            }

            $noticia->save();
            return Redirect::to('listado-noticias');
        }
        return Redirect::to('/');
    }

    public function eliminar($id)
    {
        $noticia = Noticias::find($id);
        $noticia->delete();
        return Redirect::to('listado-noticias');
    }

    public function validarTitle($title)
    {
        if (!$title || !isset($title)) {
            return false;
        }
        return true;
    }

    public function validarDescription($description)
    {
        if (!$description || !isset($description)) {
            return false;
        }
        return true;
    }

    public function validarDateAt($date_at)
    {
        if (!$date_at || !isset($date_at)) {
            return false;
        }
        return true;
    }
}
