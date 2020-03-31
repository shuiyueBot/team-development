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

Route::prefix('salesman')->group(function(){
    Route::get('create','SalesmanController@create');
    Route::post('store','SalesmanController@store');
    Route::get('index','SalesmanController@index');
    Route::get('edit/{id}','SalesmanController@edit');
    Route::post('update/{id}','SalesmanController@update');
    Route::get('destroy/{id}','SalesmanController@destroy');
});
