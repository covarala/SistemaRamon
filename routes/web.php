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


Route::get('home', function () {
    return view('comuns.inicial');
});
Route::get('/teste', 'ApiController@encontraDistribuidor');
Route::get('/testeGetCordenadas', function ()
{
  return view('teste');
});

//Rotas Admin Principais
Route::get('/admin/dashboard', 'HomeController@index')->name('admin.dashboard');
Route::get('/admin/produtos', 'HomeController@produtos')->name('admin.produtos');
Route::get('/admin/clientes', 'HomeController@clientes')->name('admin.clientes');
Route::get('/admin/usuarios', 'HomeController@usuarios')->name('admin.usuarios');
Route::get('/admin/relatorio', 'HomeController@relatorio')->name('admin.relatorio');
Route::get('/admin/excluir/usuario', 'HomeController@visaodistribuidor')->name('excluir.usuario');

//Rotas Admin Produtos
Route::get('/admin/atualiza/produto/{idProduto}', 'HomeController@viewAtualizaProduto')->name('atualiza.produto');
Route::post('/admin/update/produto/{idProduto}', 'HomeController@updateProduto')->name('update.produto');
Route::get('/admin/exclui/produto/{idProduto}', 'HomeController@excluiproduto')->name('exclui.produto');

//Rotas Admin Clientes
Route::get('/', 'HomeController@visaocliente')->name('admin.visaocliente');
Route::get('/admin/atualiza/cliente', 'HomeController@atualizacliente')->name('atualiza.cliente');
Route::get('/admin/exclui/cliente', 'HomeController@excluicliente')->name('exclui.cliente');


//Rotas Admin Distribuidores
Route::get('/admin/distribuidor', 'HomeController@distribuidor')->name('admin.distribuidor');
Route::get('/admin/visaodistribuidor', 'HomeController@visaodistribuidor')->name('admin.visaodistribuidor');
Route::get('/admin/atualiza/distribuidor', 'HomeController@atualizadistribuidor')->name('atualiza.distribuidor');
Route::get('/admin/exclui/distribuidor', 'HomeController@excluidistribuidor')->name('exclui.distribuidor');

Auth::routes();

Route::post('/formulario/inicial', 'LoginController@login')->name('formulario.login');
Route::get('/logout', 'LoginController@deslogar')->name('logout');

Route::get('/inicial', 'MainController@inicial');
Route::get('/entrar', 'MainController@login')->name('entrar');
Route::post('/formulario/registrar', 'LoginController@register')->name('formulario.register');
Route::get('/registrar', 'MainController@register')->name('registrar');

Route::post('/localizacao', 'ApiController@localizacao')->name('formulario.localizacao');

Route::get('/inicial', 'MainController@inicial')->name('inicial');
Route::get('/produtos', 'MainController@produtos')->name('produtos');
Route::get('/sobre', 'MainController@sobre')->name('sobre');
Route::get('/contatos', 'MainController@contatos')->name('contatos');
// Route::get('/distribuidores', 'MainController@distribuidores')->name('distribuidores');
Route::get('/detalhes', 'MainController@detalhes')->name('detalhes');
Route::post('/orcamento', 'MainController@realizaOrcamento')->name('realizacao.orcamento');
