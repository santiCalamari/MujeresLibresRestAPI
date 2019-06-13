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
});

Route::get('iniciar-sesion', 'Web\UserController@login');


Route::get('register', function () {
    return view('web.layouts.register');
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', 'API\UserController@logout');
    Route::post('details', 'API\UserController@details');
});
