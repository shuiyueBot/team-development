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





Route::prefix('visit')->middleware('isLogin')->group(function(){
    Route::get('create','VisitController@create');
    Route::post('store','VisitController@store');
    Route::get('index','VisitController@index');
    Route::get('destroy/{id}','VisitController@destroy');
    Route::get('edit/{id}','VisitController@edit');
    Route::post('update/{id}','VisitController@update');

});


Route::prefix('salesman')->middleware('isLogin')->group(function(){
    Route::get('create','SalesmanController@create');
    Route::post('store','SalesmanController@store');
    Route::get('index','SalesmanController@index');
    Route::get('edit/{id}','SalesmanController@edit');
    Route::post('update/{id}','SalesmanController@update');
    Route::get('destroy/{id}','SalesmanController@destroy');
});






Route::prefix("admin")->middleware('isLogin')->group(function(){
    Route::post('store',"AdminController@store");
    Route::get('create',"AdminController@create");
    Route::get('index',"AdminController@index");
    Route::get("indexShow","AdminController@indexShow");
    Route::post("SetName","AdminController@SetName");
});

Route::prefix("new")->middleware('isLogin')->group(function(){
   Route::get("create","NewController@create");
    Route::post("store","NewController@store");
    Route::get("index","NewController@index");
    Route::get("polist/{id}","NewController@polist");
});


Route::get("/login/login","LoginController@login");
Route::post("/login/loginDo","LoginController@loginDo");


