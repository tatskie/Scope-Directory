<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Admin API
Route::prefix('admin')->group(function () {
	Route::apiResources([
	    'questions' => 'API\Admin\QuestionController',
	    'tif-questions' => 'API\Admin\TIFQuestionController',
	    'products' => 'API\Admin\ProductController',
	    'pages' => 'API\Admin\PageController',
	    'users' => 'API\Admin\UserController',
	    'license-categories' => 'API\Admin\LicenseCategoryController',
	    'teacher-impact-factor' => 'API\Admin\TIFController',
	    'question-choices' => 'API\Admin\ChoiceController',
	    'followup-question' => 'API\Admin\FollowupController',
	    'followup-choices' => 'API\Admin\FollowupChoicesController',
	]);

	// filter Question
	Route::get('questions-teacher', 'API\Admin\QuestionController@teacher');
	Route::get('questions-academia', 'API\Admin\QuestionController@academia');
	Route::get('questions-undergrad', 'API\Admin\QuestionController@undergrad');

	// Filter User
	Route::get('academia-user', 'API\Admin\UserController@academia');
	Route::get('teacher-user', 'API\Admin\UserController@teacher');
	Route::get('undergrad-user', 'API\Admin\UserController@undergrad');
	Route::get('admin-user', 'API\Admin\UserController@admin');

	// question relationships
	Route::get('roles', 'API\Admin\QuestionController@roles');
	Route::get('choices', 'API\Admin\QuestionController@choices');
	Route::get('last-question', 'API\Admin\QuestionController@lastQuestion');
	Route::get('question-number/{id}', 'API\Admin\QuestionController@currentNumber');
	Route::get('tif/last-question', 'API\Admin\TIFQuestionController@lastQuestion');

	// edit question
	Route::put('code-id/{id}', 'API\Admin\QuestionController@questionType'); // update code id
	Route::put('impact-factor/{id}', 'API\Admin\QuestionController@impactFactor'); // update impact facotr id
	Route::put('filter-question/{id}', 'API\Admin\QuestionController@roleQuestion'); // update impact facotr id
});

// Academia API
Route::prefix('academia')->group(function () {

	Route::apiResources([
	    'questions' => 'API\Academia\QuestionController',
	    'informations' => 'API\Academia\AcademicInformationController',
	    'publications' => 'API\Academia\AcademicPublicationController',
	    'conferences' => 'API\Academia\ConferenceController',
	    'awards' => 'API\Academia\AwardController',
	    'videos' => 'API\Academia\VideoController',
	]);

	Route::get('year-and-month', 'API\Academia\UserController@yearAndMonth');

	Route::get('countries', 'API\Academia\UserController@country');
	Route::get('profile', 'API\Academia\UserController@profile');
	Route::get('license-category', 'API\Academia\UserController@licenseCategory');
	Route::get('tif-level', 'API\Academia\UserController@tifLevel');
	Route::put('photo', 'API\Academia\UserController@updatePhoto');
	Route::put('profile', 'API\Academia\UserController@updateProfile');
	Route::get('pdf', 'API\Academia\UserController@pdfExport');

	Route::post('receipt', 'API\Academia\ReceiptController@store');
	Route::get('receipts', 'API\Academia\ReceiptController@index');
	Route::get('download-receipt/{id}', 'API\Academia\ReceiptController@downloadReceipt');
	Route::put('change-password', 'API\Academia\UserController@changePassword');

	Route::get('shipping-address', 'API\Academia\ShippingController@index');
	Route::post('shipping-address', 'API\Academia\ShippingController@store');
});

// Teacher API
Route::prefix('teacher')->group(function () {

	Route::apiResources([
	    'questions' => 'API\Teacher\QuestionController',
	    'informations' => 'API\Teacher\AcademicInformationController',
	    'publications' => 'API\Teacher\AcademicPublicationController',
	    'conferences' => 'API\Teacher\ConferenceController',
	    'awards' => 'API\Teacher\AwardController',
	    'videos' => 'API\Teacher\VideoController',
	]);

	Route::get('year-and-month', 'API\Teacher\UserController@yearAndMonth');

	Route::get('countries', 'API\Teacher\UserController@country');
	Route::get('profile', 'API\Teacher\UserController@profile');
	Route::get('license-category', 'API\Teacher\UserController@licenseCategory');
	Route::get('tif-level', 'API\Teacher\UserController@tifLevel');
	Route::put('photo', 'API\Teacher\UserController@updatePhoto');
	Route::put('profile', 'API\Teacher\UserController@updateProfile');
	Route::get('pdf', 'API\Teacher\UserController@pdfExport');
	// Route::post('/teacher/paypal/purchase/complete', 'API\Teacher\UserController@paymentComlete');

	Route::post('receipt', 'API\Teacher\ReceiptController@store');
	Route::get('receipts', 'API\Teacher\ReceiptController@index');
	Route::get('download-receipt/{id}', 'API\Teacher\ReceiptController@downloadReceipt');
	Route::put('change-password', 'API\Teacher\UserController@changePassword');

	Route::get('back-card-data', 'API\Teacher\QuestionController@backCardData');

	Route::get('shipping-address', 'API\Teacher\ShippingController@index');
	Route::post('shipping-address', 'API\Teacher\ShippingController@store');
});

