<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('teacher')->group(function () {
	Route::get('/dashboard', 'Users\Teacher\DashboardController@index');

	Route::get('{path}', 'Users\Teacher\DashboardController@index')->where('path','([A-z\d\-\/_.]+)?'); // for vue router

});