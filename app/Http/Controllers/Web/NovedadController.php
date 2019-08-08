<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Novedad;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class NovedadController extends Controller
{

    public function getAll()
    {
        $novedades = Novedad::where('date_at', '>=', date('Y-m-d'))->orderBy('date_at', 'ASC')->paginate(10);
        return view('web.layouts.novedades', compact('novedades'));
    }

    public function showAgregarEvento()
    {
        if (Auth::check()) {
            return View::make('web.layouts.agregar-evento');
        }
        return Redirect::to('/');
    }

    public function agregarEvento()
    {
        $eventodata = array(
            'title' => Input::get('title'),
            'date_at' => Input::get('date_at'),
            'address' => Input::get('address'),
            'description' => Input::get('description'),
            'isNew' => true
        );

        if (!$this->validarTitle($eventodata['title'])) {
            return Redirect::to('agregar-evento')
                    ->with('mensaje_error', 'Error. Inserte un titulo.')
                    ->withInput();
        }

        if (!$this->validarDateAt($eventodata['date_at'])) {
            return Redirect::to('agregar-evento')
                    ->with('mensaje_error', 'Error. Inserta una fecha.')
                    ->withInput();
        }

        if (!$this->validarDescription($eventodata['description'])) {
            return Redirect::to('agregar-evento')
                    ->with('mensaje_error', 'Error. Inserta una descripcion.')
                    ->withInput();
        }

        Novedad::create($eventodata);
        return Redirect::to('listado-novedades');
    }

    public function showAgregarEfemeride()
    {
        if (Auth::check()) {
            return View::make('web.layouts.agregar-efemeride');
        }
        return Redirect::to('/');
    }

    public function agregarEfemeride()
    {
        $efemeridedata = array(
            'title' => Input::get('title'),
            'date_at' => Input::get('date_at'),
            'description' => Input::get('title'),
            'isNew' => false
        );

        if (!$this->validarTitle($efemeridedata['title'])) {
            return Redirect::to('agregar-efemeride')
                    ->with('mensaje_error', 'Error. Inserte un titulo.')
                    ->withInput();
        }

        if (!$this->validarDateAt($efemeridedata['date_at'])) {
            return Redirect::to('agregar-efemeride')
                    ->with('mensaje_error', 'Error. Inserta una fecha.')
                    ->withInput();
        }

        Novedad::create($efemeridedata);
        return Redirect::to('listado-novedades');
    }

    public function verEvento($id)
    {
        $evento = Novedad::find($id);
        return View::make('web.layouts.ver-evento')->with('evento', $evento);
    }

    public function verEfemeride($id)
    {
        $efemeride = Novedad::find($id);
        return View::make('web.layouts.ver-efemeride')->with('efemeride', $efemeride);
    }

    public function showEditarEvento($id)
    {
        if (Auth::check()) {
            $evento = Novedad::find($id);
            return View::make('web.layouts.editar-evento')->with('evento', $evento);
        }
        return Redirect::to('/');
    }

    public function editarEvento($id)
    {
        if (Auth::check()) {
            $eventodata = array(
                'title' => Input::get('title'),
                'date_at' => Input::get('date_at'),
                'address' => Input::get('address'),
                'description' => Input::get('description'),
                'isNew' => true
            );

            if (!$this->validarTitle($eventodata['title'])) {
                return redirect()->route('editar-evento', [$id])
                        ->with('mensaje_error', 'Error. Inserta un titulo.')
                        ->withInput();
            }

            if (!$this->validarDateAt($eventodata['date_at'])) {
                return redirect()->route('editar-evento', [$id])
                        ->with('mensaje_error', 'Error. Inserta una fecha.')
                        ->withInput();
            }

            if (!$this->validarDescription($eventodata['description'])) {
                return redirect()->route('editar-evento', [$id])
                        ->with('mensaje_error', 'Error. Inserta una descripcion.')
                        ->withInput();
            }

            $novedad = Novedad::find($id);
            $novedad->title = $eventodata['title'];
            $novedad->date_at = $eventodata['date_at'];
            $novedad->description = $eventodata['description'];

            if (!empty($eventodata['address'])) {
                $novedad->address = $eventodata['address'];
            }

            $novedad->save();
            return Redirect::to('listado-novedades');
        }
        return Redirect::to('/');
    }

    public function showEditarEfemeride($id)
    {
        if (Auth::check()) {
            $efemeride = Novedad::find($id);
            return View::make('web.layouts.editar-efemeride')->with('efemeride', $efemeride);
        }
        return Redirect::to('/');
    }

    public function editarEfemeride($id)
    {
        if (Auth::check()) {
            $efemeridedata = array(
                'title' => Input::get('title'),
                'date_at' => Input::get('date_at'),
                'description' => Input::get('title'),
                'isNew' => false
            );

            if (!$this->validarTitle($efemeridedata['title'])) {
                return redirect()->route('editar-efemeride', [$id])
                        ->with('mensaje_error', 'Error. Inserta un titulo.')
                        ->withInput();
            }

            if (!$this->validarDateAt($efemeridedata['date_at'])) {
                return redirect()->route('editar-efemeride', [$id])
                        ->with('mensaje_error', 'Error. Inserta una fecha.')
                        ->withInput();
            }

            $novedad = Novedad::find($id);
            $novedad->title = $efemeridedata['title'];
            $novedad->date_at = $efemeridedata['date_at'];

            $novedad->save();
            return Redirect::to('listado-novedades');
        }
        return Redirect::to('/');
    }

    public function eliminar($id)
    {
        $novedad = Novedad::find($id);
        $novedad->delete();
        return Redirect::to('listado-novedades');
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
