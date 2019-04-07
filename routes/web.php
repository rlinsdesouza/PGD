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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pessoas/cadastro', 'PessoaController@formpessoa');
Route::get('/pessoas/editar/{id}','PessoaController@formpessoa');
Route::post('/pessoas/salvar', 'PessoaController@salvarpessoa');
Route::post('/pessoas/excluir', 'PessoaController@excluir');
Route::get('/pessoas/listar','PessoaController@listagem');
Route::get('/pessoas/api/listar','PessoaController@listarpessoas');

Route::get('/insumos/cadastro', 'InsumoController@forminsumo');
Route::get('/insumos/editar/{id}','InsumoController@forminsumo');
Route::post('/insumos/salvar', 'InsumoController@salvarinsumo');
Route::post('/insumos/excluir', 'InsumoController@excluir');
Route::get('/insumos/listar','InsumoController@listagem');
Route::get('/insumos/api/listar','InsumoController@listarinsumos');

Route::get('/pratos/cadastro', 'PratoController@show');
Route::post('/pratos/salvar', 'PratoController@store');
Route::get('/pratos/listar','PratoController@index');
Route::get('/pratos/api/listar','PratoController@listarpratos');
Route::get('/pratos/editar/{id}','PratoController@show');
Route::post('/pratos/excluir', 'PratoController@destroy');

Route::get('/producoes/cadastro', 'ProducaoController@show');
Route::post('/producoes/salvar', 'ProducaoController@store');
Route::get('/producoes/listar','ProducaoController@index');
Route::get('/producoes/avaliar','ProducaoController@avaliar');
Route::get('/producoes/avaliar/{id}','ProducaoController@avaliarlist');
Route::get('/producoes/api/listar','ProducaoController@listarproducoes');
Route::get('/producoes/editar/{id}','ProducaoController@show');
Route::post('/producoes/excluir', 'ProducaoController@destroy');

Route::get('/avaliacoes/index', 'AvaliacaoController@index');
Route::get('/avaliacoes/cadastro/{id}', 'AvaliacaoController@show');
Route::post('/avaliacoes/salvar', 'AvaliacaoController@store');
Route::get('/avaliacoes/listar','AvaliacaoController@index');
Route::get('/avaliacoes/api/listar','AvaliacaoController@listarproducoes');
Route::get('/avaliacoes/editar/{id}','AvaliacaoController@show');
Route::post('/avaliacoes/excluir', 'AvaliacaoController@destroy');

Route::get('/produzidos/index', 'ProduzidosController@index');
Route::get('/produzidos/api/listardia/{dia}', 'ProduzidosController@listardia');
Route::get('/produzidos/avaliar','ProduzidosController@show');
Route::get('/produzidos/listavaliar/{dia}','ProduzidosController@show');
Route::post('/produzidos/avaliar', 'ProduzidosController@store');







