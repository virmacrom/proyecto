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

////////////////
//MEDICO
Route::group(['middleware' => ['auth', 'medico'], 'prefix' => 'medico'], function(){
    Route::get('/', function () {
        return view('medico.index');
    });
});

//PACIENTE
Route::group(['middleware' => ['auth', 'paciente'], 'prefix' => 'paciente'], function(){
    Route::get('/', function () {
        return view('paciente.index');
    });
});


Route::resource('medicos', 'MedicoController');
Route::resource('pacientes','PacienteController');

Auth::routes();

/////////
Route::get('medicos/login', 'MedicosController@show');

Route::get('/home', 'HomeController@index');
