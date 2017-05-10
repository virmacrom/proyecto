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

Route::delete('especialidades/destroyAll', 'EspecialidadController@destroyAll')->name('especialidades.destroyAll');
Route::resource('especialidades', 'EspecialidadController');


Route::delete('enfermedades/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedades.destroyAll');
Route::resource('enfermedades', 'EnfermedadController');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes','PacienteController');

Auth::routes();

/////////
//Route::get('medicos/login', 'MedicoController@show');
//Route::get('pacientes/login', 'PacienteController@show');
Route::get('/home', 'HomeController@index');
Route::get('/homemedico', 'HomeController@index');

