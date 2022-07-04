<?php

/*
|--------------------------------------------------------------------------
| Undergrad Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('undergrad')->group(function () {
	Route::get('/dashboard', 'Undergrad\DashboardController@index');

	Route::get('{path}', 'Undergrad\DashboardController@index')->where('path','([A-z\d\-\/_.]+)?'); // for vue router

});

