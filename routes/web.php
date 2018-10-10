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

<<<<<<< HEAD
Route::get('/prueba/{fecha_inicio}/{fecha_fin}/{empleado_objetivo}','PagoController@prueba')->name('prueba');
=======
Route::get('buscar/{fecha_inicio}/{fecha_fin}/{buscar}','PagoController@buscar')->name('buscar');

Route::get('/pruebas/{fecha_inicio}/{fecha_fin}/{empleado_objetivo}', 'PagoController@pruebas')->name('pruebas');
>>>>>>> 537c41d5636cc6c8f4e5100fc17ca1889acae598
