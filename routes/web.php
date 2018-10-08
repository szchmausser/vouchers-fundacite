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

Route::resource('empleados', 'EmpleadoController');
Route::resource('conceptos', 'ConceptoController');
Route::resource('pagos', 'PagoController');

Route::get('buscar/{fecha_inicio}/{fecha_fin}/{buscar}','PagoController@buscar')->name('buscar');

Route::get('/pruebas', 'PagoController@pruebas')->name('pruebas');