<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index');
});
Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
		Route::get('/', 'Admin\HomeController@index');
		Route::resource('/users','Admin\UserController');
    	Route::resource('/categories','Admin\CategoryController');
    	Route::resource('/words', 'Admin\WordController');
	});
	Route::group(['middleware' => 'user'], function(){
		Route::get('/','Application\HomeController@index');
	});
	Route::get('users/show/{user?}', 'Application\UserController@how');
	Route::get('/users/edit', 'Application\UserController@edit');
    Route::resource('user', 'Application\UserController', ['only' => [
        'update'
    ]]);
});
