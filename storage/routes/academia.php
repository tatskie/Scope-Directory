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

Route::prefix('academia')->group(function () {
	Route::get('/dashboard', 'Academia\DashboardController@index');

	Route::get('{path}', 'Academia\DashboardController@index')->where('path','([A-z\d\-\/_.]+)?'); // for vue router

});

