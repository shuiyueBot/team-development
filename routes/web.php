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

<<<<<<< HEAD
//闭包路由
//Route::get('/', function () {
//    return view('welcome');
//});



Route::prefix('visit')->group(function(){
    Route::get('create','VisitController@create');
    Route::post('store','VisitController@store');
    Route::get('index','VisitController@index');
    Route::get('destroy/{id}','VisitController@destroy');
    Route::get('edit/{id}','VisitController@edit');
    Route::post('update/{id}','VisitController@update');
});
=======

Route::prefix("admin")->group(function(){
    Route::post('store',"AdminController@store");
    Route::get('create',"AdminController@create");
    Route::get('index',"AdminController@index");
    Route::get("indexShow","AdminController@indexShow");
    Route::post("SetName","AdminController@SetName");
});

Route::get("/login/login","LoginController@login");
Route::post("/login/loginDo","LoginController@loginDo");
>>>>>>> d604c6ae70019f29a7b914d0ec272010e30b6444
