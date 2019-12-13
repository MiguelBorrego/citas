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
//Poner las acciones definidas por el programador antes del CRUD por defecto que monta Laravel
Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');

Route::delete('aseguradoras/destroyAll', 'AseguradoraController@destroyAll')->name('aseguradoras.destroyAll');
Route::resource('aseguradoras', 'AseguradoraController');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes', 'PacienteController');

Route::delete('localizaciones/destroyAll', 'LocalizacionController@destroyAll')->name('localizaciones.destroyAll');
Route::resource('localizaciones', 'LocalizacionController');

Route::resource('citas', 'CitaController');

Route::resource('tratamientos', 'TratamientoController');

Route::delete('medicamentos/destroyAll', 'MedicamentoController@destroyAll')->name('medicamentos.destroyAll');
Route::resource('medicamentos', 'MedicamentoController');


Auth::routes();

Route::get('/home', 'HomeController@index');

