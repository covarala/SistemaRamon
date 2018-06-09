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

Route::get('', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('dashboard');

Auth::routes();

Route::get('/inicial', 'MainController@inicial');
Route::get('/entrar', 'MainController@login')->name('entrar');
Route::get('/registrar', 'MainController@register')->name('registrar');
Route::post('/inicial', 'LoginController@login')->name('formulario.login');
Route::get('/logout', 'LoginController@logout')->name('botao.logout');


Route::get('/produtos', 'MainController@produtos')->name('produtos');
Route::get('/sobre', 'MainController@sobre')->name('sobre');
Route::get('/contatos', 'MainController@contatos')->name('contatos');
Route::get('/representantes', 'MainController@representantes')->name('representantes');
