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
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
	 Route::get('/family',                                     	 'Family_compositionController@index');
	 Route::get('/familyCdst',                              	 'Family_compositionController@create');
	 Route::post('/familyCdst',                               	 'Family_compositionController@store');
     Route::get('/family/{id}',                                  'Family_compositionController@show');
     Route::post('/family/{id}',                                 'Family_compositionController@update');

     //geral 
     Route::get('/home',                               	  'Family_compositionController@atendimentosDiario');

     // rotas responsáveis pelos atendimentos 
     Route::get('/attendance/report',                      'atendimentoController@report');
     Route::get('/attendance/{id}',                        'atendimentoController@create');
     Route::post('/attendance/{id}',                       'atendimentoController@store');
     Route::get('/attendance',                             'atendimentoController@index');

     
     Route::get(' /attendance/edit/{id}/{idAtendimento}',                       'atendimentoController@edit');
     Route::post(' /attendance/edit/{id}/{idAtendimento}',                       'atendimentoController@update');

     Route::resource('user', 'UserController');
     
     
     
    //   FIM rotas responsáveis pelos atendimentos



});
