<?php
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/', function () {
    return view('web.layouts.mainlayout');
})->name('inicio');

Route::get('iniciar-sesion', ['as' => 'iniciar-sesion', 'uses' => 'Web\UserController@showlogin']);
Route::post('login', 'Web\UserController@login');

Route::get('listado-novedades', ['as' => 'listado-novedades', 'uses' => 'Web\NovedadController@getAll']);
Route::get('listado-noticias', ['as' => 'listado-noticias', 'uses' => 'Web\NoticiaController@getAll']);

Route::get('/asesorate', function () {
    return view('web.layouts.asesorate');
})->name('asesorate');

Route::get('/informate', function () {
    return view('web.layouts.informate');
})->name('informate');

Route::get('ver-evento/{id}', ['as' => 'ver-evento', 'uses' => 'Web\NovedadController@verEvento']);
Route::get('Ver-efemeride/{id}', ['as' => 'ver-efemeride', 'uses' => 'Web\NovedadController@verEfemeride']);
Route::get('Ver-noticia/{id}', ['as' => 'ver-noticia', 'uses' => 'Web\NoticiaController@verNoticia']);

Route::get('pdf-usuarios', ['as' => 'pdf-usuarios', 'uses' => 'Web\UserController@pdf']);

Route::group(array('before' => 'auth'), function() {
    Route::get('perfil', 'Web\UserController@showPerfil');
    Route::post('register', 'Web\UserController@register');
    Route::get('registrarse', ['as' => 'registrarse', 'uses' => 'Web\UserController@showRegister']);
    Route::get('cerrar-sesion', ['as' => 'cerrar-sesion', 'uses' => 'Web\UserController@logOut']);

    Route::get('agregar-evento', ['as' => 'agregar-evento', 'uses' => 'Web\NovedadController@showAgregarEvento']);
    Route::post('add-evento', 'Web\NovedadController@agregarEvento');

    Route::get('agregar-efemeride', ['as' => 'agregar-efemeride', 'uses' => 'Web\NovedadController@showAgregarEfemeride']);
    Route::post('add-efemeride', 'Web\NovedadController@agregarEfemeride');

    Route::get('agregar-noticia', ['as' => 'agregar-noticia', 'uses' => 'Web\NoticiaController@showAgregarNoticia']);
    Route::post('add-noticia', 'Web\NoticiaController@agregarNoticia');

    Route::get('agregar-digiteca', ['as' => 'agregar-digiteca', 'uses' => 'Web\DigitecaController@showAgregarDigiteca']);
    Route::post('add-digiteca', 'Web\DigitecaController@agregarDigiteca');

    Route::get('editar-evento/{id}', ['as' => 'editar-evento', 'uses' => 'Web\NovedadController@showEditarEvento']);
    Route::patch('edit-evento/{id}', ['as' => 'edit-evento', 'uses' => 'Web\NovedadController@editarEvento']);

    Route::get('editar-efemeride/{id}', ['as' => 'editar-efemeride', 'uses' => 'Web\NovedadController@showEditarEfemeride']);
    Route::patch('edit-efemeride/{id}', ['as' => 'edit-efemeride', 'uses' => 'Web\NovedadController@editarEfemeride']);

    Route::get('editar-noticia/{id}', ['as' => 'editar-noticia', 'uses' => 'Web\NoticiaController@showEditarNoticia']);
    Route::patch('edit-noticia/{id}', ['as' => 'edit-noticia', 'uses' => 'Web\NoticiaController@editarNoticia']);

    Route::get('editar-digiteca/{id}', ['as' => 'editar-digiteca', 'uses' => 'Web\DigitecaController@showEditarDigiteca']);
    Route::patch('edit-digiteca/{id}', ['as' => 'edit-digiteca', 'uses' => 'Web\DigitecaController@editarDigiteca']);

    Route::delete('eliminar-novedad/{id}', ['as' => 'eliminar-novedad', 'uses' => 'Web\NovedadController@eliminar']);
    Route::delete('eliminar-noticidad/{id}', ['as' => 'eliminar-noticia', 'uses' => 'Web\NoticiaController@eliminar']);
    Route::delete('eliminar-digiteca/{id}', ['as' => 'eliminar-digiteca', 'uses' => 'Web\DigitecaController@eliminar']);
});



// ************************************************************* //
// ****************  RUTAS PARA TESTS **************************//
// *************************************************************//
//Route::get('indexC', 'Web\CuestionarioController@index');
//
//Route::get('showCA', 'Web\CentroAyudaController@show');
//Route::get('updateCA', 'Web\CentroAyudaController@update');
//Route::get('validarAverageGeneralCA', 'Web\CentroAyudaController@validarAverageGeneral');
//Route::get('validarVotersCA', 'Web\CentroAyudaController@validarVoters');
//
//Route::get('showO', 'Web\OpinionController@show');
//Route::get('storeO', 'Web\OpinionController@store');
//Route::get('validarNameO', 'Web\OpinionController@validarName');
//Route::get('validarAverageO', 'Web\OpinionController@validarAverage');
//Route::get('validarUserIdO', 'Web\OpinionController@validarUserId');
//Route::get('validarCentroAyudaIdO', 'Web\OpinionController@validarCentroAyudaId');
//Route::get('updateCentroAyudaO', 'Web\OpinionController@updateCentroAyuda');
//
//Route::get('indexP', 'Web\PreguntaController@index');
//Route::get('showP', 'Web\PreguntaController@show');
//
//Route::get('showR', 'Web\RolController@show');
//
//Route::get('indexD', 'Web\DigitecaController@index');
//Route::get('showD', 'Web\DigitecaController@show');
//Route::get('storeD', 'Web\DigitecaController@store');
//Route::get('updateD', 'Web\DigitecaController@update');
//Route::get('deleteD', 'Web\DigitecaController@delete');
//Route::get('validarNameD', 'Web\DigitecaController@validarName');
//Route::get('validarWebSiteD', 'Web\DigitecaController@validarWebSite');
//Route::get('agregarHttpD', 'Web\DigitecaController@agregarHttp');
//
//Route::get('showF', 'Web\FavoritoController@show');
//Route::get('storeF', 'Web\FavoritoController@store');
//Route::get('deleteF', 'Web\FavoritoController@delete');
//Route::get('validarUserIdF', 'Web\FavoritoController@validarUserId');
//Route::get('validarCentroAyudaIdF', 'Web\FavoritoController@validarCentroAyudaId');
//
//Route::get('indexN', 'Web\NoticiaController@index');
//Route::get('showN', 'Web\NoticiaController@show');
//Route::get('storeN', 'Web\NoticiaController@store');
//Route::get('updateN', 'Web\NoticiaController@update');
//Route::get('deleteN', 'Web\NoticiaController@delete');
//Route::get('validarTitleN', 'Web\NoticiaController@validarTitle');
//Route::get('validarDescriptionN', 'Web\NoticiaController@validarDescription');
//Route::get('validarDateAtN', 'Web\NoticiaController@validarDateAt');
//
//Route::get('indexNov', 'Web\NovedadController@index');
//Route::get('getAllNov', 'Web\NovedadController@getAll');
//Route::get('showNov', 'Web\NovedadController@show');
//Route::get('storeNov', 'Web\NovedadController@store');
//Route::get('updateNov', 'Web\NovedadController@update');
//Route::get('deleteNov', 'Web\NovedadController@delete');
//Route::get('validarTitleNov', 'Web\NovedadController@validarTitle');
//Route::get('validarDescriptionNov', 'Web\NovedadController@validarDescription');
//Route::get('validarDateAtNov', 'Web\NovedadController@validarDateAt');
//Route::get('validarIsNewNov', 'Web\NovedadController@validarIsNew');
//
//Route::get('register', 'Web\UserController@register');
//Route::get('login', 'Web\UserController@login');
//Route::get('logout', 'Web\UserController@logout');
//Route::get('details', 'Web\UserController@details');
//Route::get('changePassword', 'Web\UserController@changePassword');
//Route::get('voluntario', 'Web\UserController@voluntario');
//Route::get('actualizarUsuario', 'Web\UserController@actualizarUsuario');
//Route::get('recuperarPassword', 'Web\UserController@recuperarPassword');




