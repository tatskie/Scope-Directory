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

Route::prefix('corporate')->group(function () {
    Route::get('dashboard', 'Corporate\PageController@dashboard')->name('corporate.dashboard');
    Route::get('{path}', 'Corporate\PageController@dashboard')->where('path','([A-z\d\-\/_.]+)?'); // for vue router
	// Route::get('subscription/{plan}', 'Corporate\SubscriptionController@show')->name('corporate.subscription');
	// Route::post('subscribed', 'Corporate\SubscriptionController@create')->name('corporate.subscribed');
});
