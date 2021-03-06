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
Route::get('listall','EspecialidadController@listall' );

Route::delete('enfermedades/destroyAll', 'EnfermedadController@destroyAll')->name('enfermedades.destroyAll');
Route::resource('enfermedades', 'EnfermedadController');

Route::get('citas/create',['middleware'=>'auth->user()->paciente', function(){
    return "puedes crear una cita";
}]);
Route::resource('citas', 'CitaController');

Route::delete('tipoencuestas/destroyAll', 'TipoEncuestaController@destroyAll')->name('tipoencuestas.destroyAll');
Route::resource('tipoencuestas', 'TipoEncuestaController');

Route::get('encuestas/create/{id}','EncuestaController@createConTipoEncuesta')->name('encuestas.createConTipoEncuesta');
Route::get('encuestas/indexformulario','EncuestaController@indexformulario')->name('encuestas.indexformulario');
Route::delete('encuestas/destroyAll', 'EncuestaController@destroyAll')->name('encuestas.destroyAll');
Route::resource('encuestas', 'EncuestaController');


Route::delete('preguntas/destroyAll', 'PreguntaController@destroyAll')->name('preguntas.destroyAll');
Route::resource('preguntas', 'PreguntaController');

Route::delete('respuestas/destroyAll', 'RespuestasController@destroyAll')->name('respuestas.destroyAll');
Route::resource('respuestas', 'RespuestasController');


Route::delete('respuestaselegidas/destroyAll', 'RespuestasElegidasController@destroyAll')->name('respuestaselegidas.destroyAll');
Route::resource('respuestaselegidas', 'RespuestasElegidasControllerº    1q  a3');

Route::resource('medicos', 'MedicoController');
Route::resource('pacientes','PacienteController');

Auth::routes();


Route::get('/home', 'HomeController@index');
Route::get('/homemedico', 'HomeController@index');
Route::get('/homesas', 'HomeController@index');

