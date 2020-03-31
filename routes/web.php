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



Route::prefix("admin")->group(function(){
    Route::post('store',"AdminController@store");
    Route::get('create',"AdminController@create");
    Route::get('index',"AdminController@index");
    Route::get("indexShow","AdminController@indexShow");
    Route::post("SetName","AdminController@SetName");
});

Route::get("/login/login","LoginController@login");
Route::post("/login/loginDo","LoginController@loginDo");