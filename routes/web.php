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
Route::get('/admin/distribuidor', 'HomeController@distribuidor')->name('admin.distribuidor');
Route::get('/admin/relatorio', 'HomeController@relatorio')->name('admin.relatorio');

//Rotas Admin Usuários
Route::get('/admin/atualiza/usuario/{idUsuario}', 'HomeController@viewAtualizaUsuario')->name('atualiza.usuario');
Route::post('/admin/update/usuario/{idUsuario}', 'HomeController@updateUsuario')->name('update.usuario');
Route::get('/admin/exclui/usuario/{idUsuario}', 'HomeController@excluiUsuario')->name('exclui.usuario');
Route::get('/admin/view/cadastro/usuario', 'HomeController@viewCadastroUsuario')->name('view.cadastro.usuario');
Route::post('/admin/cadastro/usuario', 'HomeController@cadastroUsuario')->name('cadastro.usuario');

//Rotas Admin Produtos
Route::get('/admin/atualiza/produto/{idProduto}', 'HomeController@viewAtualizaProduto')->name('atualiza.produto');
Route::post('/admin/update/produto/{idProduto}', 'HomeController@updateProduto')->name('update.produto');
Route::get('/admin/exclui/produto/{idProduto}', 'HomeController@excluiProduto')->name('exclui.produto');
Route::get('/admin/view/cadastro/produto', 'HomeController@viewCadastroProduto')->name('view.cadastro.produto');
Route::post('/admin/cadastro/produto', 'HomeController@cadastroProduto')->name('cadastro.produto');

//Rotas Admin Distribuidores
Route::get('/admin/atualiza/distribuidor/{idDistribuidor}', 'HomeController@viewAtualizaDistribuidor')->name('atualiza.distribuidor');
Route::post('/admin/update/distribuidor/{idDistribuidor}', 'HomeController@updateDistribuidor')->name('update.distribuidor');
Route::get('/admin/exclui/distribuidor/{idDistribuidor}', 'HomeController@excluiDistribuidor')->name('exclui.distribuidor');
Route::get('/admin/view/cadastro/distribuidor', 'HomeController@viewCadastroDistribuidor')->name('view.cadastro.distribuidor');
Route::post('/admin/cadastro/distribuidor', 'HomeController@cadastroDistribuidor')->name('cadastro.distribuidor');
Route::get('/admin/visaodistribuidor', 'HomeController@visaodistribuidor')->name('admin.visaodistribuidor');

//Rotas Admin Clientes
Route::get('/admin/visao/cliente', 'HomeController@visaocliente')->name('admin.visaocliente');
Route::get('/admin/atualiza/cliente', 'HomeController@atualizacliente')->name('atualiza.cliente');
Route::get('/admin/exclui/cliente', 'HomeController@excluicliente')->name('exclui.cliente');

Auth::routes();

//Rotas Clientes Não registrados
Route::get('/inicial', 'MainController@inicial')->name('inicial');
Route::get('/entrar', 'MainController@login')->name('entrar');
Route::get('/registrar', 'MainController@register')->name('registrar');
Route::post('/formulario/inicial', 'LoginController@login')->name('formulario.login');
Route::post('/formulario/registrar', 'LoginController@register')->name('formulario.register');
Route::get('/produtos', 'MainController@produtos')->name('produtos');
Route::get('/sobre', 'MainController@sobre')->name('sobre');
Route::get('/contatos', 'MainController@contatos')->name('contatos');

Route::post('/orcamento', 'MainController@realizaOrcamento')->name('realizacao.orcamento');

//Rotas Clientes Resgistrados
Route::post('/localizacao', 'ApiController@localizacao')->name('formulario.localizacao');
Route::get('/logout', 'LoginController@deslogar')->name('logout');
