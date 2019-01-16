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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insumos/cadastro', 'InsumoController@forminsumo');
Route::get('/insumos/editar/{id}','InsumoController@forminsumo');
Route::post('/insumos/salvar', 'InsumoController@salvarinsumo');
Route::post('/insumos/excluir', 'InsumoController@excluir');
Route::get('/insumos/listar','InsumoController@listagem');
Route::get('/insumos/api/listar','InsumoController@listarinsumos');

Route::get('/pratos/cadastro', 'PratoController@show');
Route::post('/pratos/salvar', 'PratoController@store');
Route::get('/insumos/listar','PratoController@listagem');
Route::get('/pratos/api/listar','PratoController@index');




