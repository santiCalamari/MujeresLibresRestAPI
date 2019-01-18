<?php
use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');


Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', 'API\UserController@logout');
    Route::post('details', 'API\UserController@details');

    Route::get('digiteca', 'API\DigitecaController@index');
//    Route::get('digiteca/{digiteca}', 'API\DigitecaController@show');
    Route::post('digiteca', 'API\DigitecaController@store');
    Route::put('digiteca/{digiteca}', 'API\DigitecaController@update');
    Route::delete('digiteca/{digiteca}', 'API\DigitecaController@delete');
//
    Route::get('novedad', 'API\NovedadController@index');
    Route::get('novedad/{novedad}', 'API\NovedadController@show');
    Route::post('novedad', 'API\NovedadController@store');
    Route::put('novedad/{novedad}', 'API\NovedadController@update');
    Route::delete('novedad/{novedad}', 'API\NovedadController@delete');
    
    Route::get('noticia', 'API\NoticiaController@index');
    Route::get('noticia/{noticia}', 'API\NoticiaController@show');
    Route::post('noticia', 'API\NoticiaController@store');
    Route::put('noticia/{noticia}', 'API\NoticiaController@update');
    Route::delete('noticia/{noticia}', 'API\NoticiaController@delete');

//    Route::get('opinion', 'API\OpinionController@index');
    Route::get('opinion/{centro_ayuda_id}', 'API\OpinionController@show');
    Route::post('opinion', 'API\OpinionController@store');
    Route::put('opinion/{centro_ayuda_id}', 'API\OpinionController@update');
//    Route::delete('opinion/{opinion}', 'API\OpinionController@delete');
//    
//    Route::get('favorito', 'API\OpinionController@index');
    Route::get('favorito/{user_id}', 'API\FavoritoController@show');
    Route::post('favorito', 'API\FavoritoController@store');
//    Route::put('favorito/{centro_ayuda_id}', 'API\OpinionController@update');
    Route::delete('favorito/{favorito}', 'API\FavoritoController@delete');

//    Route::get('centro-de-ayuda', 'API\CentroAyudaController@index');
//    Route::get('centro-de-ayuda/{user_id}', 'API\CentroAyudaController@show');
//    Route::post('centro-de-ayuda', 'API\CentroAyudaController@store');
    Route::put('centro-de-ayuda/{centroAyuda}', 'API\CentroAyudaController@update');
//    Route::delete('centro-de-ayuda/{centroAyuda}', 'API\CentroAyudaController@delete');

    Route::get('cuestionario', 'API\CuestionarioController@index');
//    Route::get('cuestionario', 'API\CuestionarioController@index');
//    Route::get('cuestionario/{cuestionario}', 'API\CuestionarioController@show');
//    Route::post('cuestionario', 'API\CuestionarioController@store');
//    Route::put('cuestionario/{cuestionario}', 'API\CuestionarioController@update');
//    Route::delete('cuestionario/{cuestionario}', 'API\CuestionarioController@delete');

    Route::get('pregunta', 'API\PreguntaController@index');
    Route::get('pregunta/{cuestionario_id}', 'API\PreguntaController@show');
//    Route::post('pregunta', 'API\PreguntaController@store');
//    Route::put('pregunta/{pregunta}', 'API\PreguntaController@update');
//    Route::delete('pregunta/{pregunta}', 'API\PreguntaController@delete');
//
//    Route::get('rol', 'API\RolController@index');
    Route::get('rol/{rol}', 'API\RolController@show');
//    Route::post('rol', 'API\RolController@store');
//    Route::put('rol/{rol}', 'API\RolController@update');
//    Route::delete('rol/{rol}', 'API\RolController@delete');
});
