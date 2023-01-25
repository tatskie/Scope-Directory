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

Route::prefix('admin')->group(function () {
	Route::get('/dashboard', 'Admin\DashboardController@index');

	Route::get('{path}', 'Admin\DashboardController@index')->where('path','([A-z\d\-\/_.]+)?'); // for vue router

	// Route::get('page-lists', 'Admin\PageController@pages');
	// Route::resource('pages', 'Admin\PageController');
	// Route::resource('/sub-pages', 'Admin\SubPageController');

});

