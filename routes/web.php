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

Route::get('/insumos/cadastro', 'InsumoController@forminsumo');
Route::get('/insumos/editar/{id}','InsumoController@forminsumo');
Route::post('/insumos/salvar', 'InsumoController@salvarinsumo');
Route::post('/insumos/excluir', 'InsumoController@excluir');
Route::get('/insumos/listar','InsumoController@listagem');
Route::get('/insumos/api/listar','InsumoController@listarinsumos');

Route::get('/pratos/cadastro', 'PratoController@show');
Route::post('/pratos/salvar', 'PratoController@store');
Route::get('/pratos/listar','PratoController@index');
Route::get('/pratos/api/listar','PratoController@listagem');
Route::get('/pratos/editar/{id}','PratoController@show');
Route::post('/pratos/excluir', 'PratoController@destroy');

Route::get('/producoes/cadastro', 'ProducaoController@show');
Route::post('/producoes/salvar', 'ProducaoController@store');
Route::get('/producoes/listar','ProducaoController@index');
Route::get('/producoes/api/listar','ProducaoController@listagem');
Route::get('/producoes/editar/{id}','ProducaoController@show');
Route::post('/producoes/excluir', 'ProducaoController@destroy');






