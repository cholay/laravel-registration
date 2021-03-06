<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
//Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
//Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));

//Route::post('/register', array('as' => 'register', 'uses' => 'UsersController@store'));
Route::resource('user', 'UsersController');
Route::resource('profile', 'UsersController@profile');