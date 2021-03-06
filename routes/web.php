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


Route::group(['middleware' => 'guest'], function () {
	Route::get('/', function () {
	    return view('auth.register');
	});
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile_edit', function () {
	    return view('profile_edit');
	});
	Route::post('profile_update', 'ProfileController@update');
	Route::post('password_update', 'ProfileController@password_update');
	Route::get('dashboard', 'HomeController@index')->name('Dashboard');
});

Auth::routes();



