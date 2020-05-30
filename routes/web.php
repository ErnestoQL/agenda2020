<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContactosController@index')->name('contactos');

Route::get('/crear', 'ContactosController@create')->name('crear');
Route::get('/editar/{id}', 'ContactosController@edit')->name('editar');
Route::get('/eliminar/{id}', 'ContactosController@destroy')->name('eliminar');

Route::post('/crear_datos/', 'ContactosController@store')->name('crear.send');
Route::post('/editar_datos/{id}', 'ContactosController@update')->name('editar.send');

Route::get('/info', 'ContactosController@info')->name('info');

Route::post('/search', 'ContactosController@search')->name('search');
