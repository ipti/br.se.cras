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

     Route::get('/attendance/{id}',                             'Family_compositionController@atendimentos');


     Route::post('/attendance/{id}',                       'family_compositionController@cadastroAtentimentos');

//     atendimentos da view de todos os atendimentos
     Route::get('/attendance',                             'Family_compositionController@atendimentosIndex');

    // Route::post('/attendance/{id}/cdstA',                        'Family_compositionController@atendimentos');


     Route::get('/home',                               	  'Family_compositionController@atendimentosDiario');

     //Route::get('/attendance/{id}',                             'HomeController@atendimentos');
     //Route::post('/attendance/{id}',                                 'HomeController@update');




});
