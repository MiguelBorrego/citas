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

Route::get('medicos/showAll/{id}', 'MedicoController@showAll')->name('medicos.showAll');
Route::get('medicos/indexBusqueda', 'MedicoController@indexBusqueda')->name('medicos.indexBusqueda');
Route::resource('medicos', 'MedicoController');

Route::delete('enfermedades/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedades.destroyAll');
Route::resource('enfermedades', 'EnfermedadController');

Route::get('pacientes/showAll/{id}', 'PacienteController@showAll')->name('pacientes.showAll');
Route::get('pacientes/show2/{id}', 'PacienteController@show2')->name('pacientes.show2');
Route::get('pacientes/show2All/{id}', 'PacienteController@show2All')->name('pacientes.show2All');
Route::get('pacientes/indexBusqueda', 'PacienteController@indexBusqueda')->name('pacientes.indexBusqueda');
Route::resource('pacientes', 'PacienteController');

Route::delete('localizaciones/destroyAll', 'LocalizacionController@destroyAll')->name('localizaciones.destroyAll');
Route::resource('localizaciones', 'LocalizacionController');

Route::get('citas/indexAll', 'CitaController@indexAll')->name('citas.indexAll');
Route::resource('citas', 'CitaController');

Route::get('tratamientos/indexAll', 'TratamientoController@indexAll')->name('tratamientos.indexAll');
Route::resource('tratamientos', 'TratamientoController');


Route::delete('medicamentos/destroyAll', 'MedicamentoController@destroyAll')->name('medicamentos.destroyAll');
Route::resource('medicamentos', 'MedicamentoController');

Route::resource('medicamento_tratamientos', 'Medicamento_TratamientoController');


Auth::routes();

Route::get('/home', 'HomeController@index');

