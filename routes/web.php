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

Route::get('/registermedico', 'auth\RegisterController@showRegistrationMedico')->name('registermedico');



Route::get('/register', function () {
    return view('Auth/register');
});

Route::get('/registersas', function () {
    return view('Auth/registersas');
});

Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');


Route::delete('enfermedades/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedades.destroyAll');
Route::resource('enfermedades', 'EnfermedadController');

Route::delete('encuestas/destroyAll', 'EncuestaController@destroyAll')->name('encuestas.destroyAll');
Route::resource('encuestas', 'EncuestaController');


Route::resource('medicos', 'MedicoController');
Route::resource('pacientes','PacienteController');

Auth::routes();


Route::get('/home', 'HomeController@index');
Route::get('/homemedico', 'HomeController@index');
Route::get('/homesas', 'HomeController@index');

