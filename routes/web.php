<?php

Route::get('/', function() {
	return view('welcome');
});

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login-post');

Route::get('register','Auth\RegisterController@index')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register-post');
Route::get('admin', 'Admin\AdminController@index')->name('admin');

Route::get('users/verify/{token}', 'User\UserController@verify')->name('verify');