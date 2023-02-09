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

Route::prefix('editor')->group(function () {
	Route::get('/dashboard', 'Users\Editor\DashboardController@index');

	Route::get('{path}', 'Users\Editor\DashboardController@index')->where('path','([A-z\d\-\/_.]+)?'); // for vue router

});