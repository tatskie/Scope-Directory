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
// \URL::forceScheme('https');
use App\Notifications\ScopePublicProfile;

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/notification', function(){
    auth()->user()->notify(new ScopePublicProfile(auth()->user(), auth()->user()->scope));
});

// register with set of roles
Route::get('/academic/register', function(){
    return view('auth.academic');
});

Route::get('/teacher/register', function(){
    return view('auth.teacher');
});

Route::get('/corporate/register', function(){
    return view('auth.corporate');
});

Route::get('/undergrad/register', function(){
    return view('auth.undergrad');
});

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice'); 
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend'); 
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');

// Route::get('/users/verify/{token}', 'VerifyEmailController@verifyUser');
// Route::get('/reset/password/{token}', 'VerifyEmailController@reset')->name('reset');
// Route::post('/reset/password/{token}', 'VerifyEmailController@resetPassword')->name('update.password');

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::get('pdf', function(){
    $receipt = \App\Receipt::findOrFail(2);
    return view('teacher.reciepts.pdf', compact('receipt'));
});

Route::post('api-login', 'Auth\LoginController@apiLogin');

Route::group(['middleware' => ['web']], function () {
    Route::get('autologin', function () {
        $user = $_GET['id'];
        \Auth::loginUsingId($user, true);
        return redirect()->intended('/academia/dashboard');
    });
});
// Route::resource('/account-type', 'AccountType')->only(['index', 'store']);
/*
|----------------------------------------------------------------------------
| Pages
|----------------------------------------------------------------------------
|
| List of pages in user
|
*/
Route::get('/', 'PageController@welcome');  
Route::get('/pages/{page}', 'PageController@show');  
Route::get('/pages/{page}/subpages/{subpage}', 'PageController@showSubPage');  

Route::get('/journal-sample', function () {
    $pages = \App\Page::all();
    $journals = \App\Journal::all();

    return view('journal', compact(['journals', 'pages']));
});  

/*
|----------------------------------------------------------------------------
| Academic Routes
|----------------------------------------------------------------------------
|
| All routes for academic user
|
*/

Route::group(['middleware' => ['auth', 'verified', 'twofactor']], function() {
	// Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/academic/welcome', 'HomeController@index')->name('welcome.user');  
    Route::put('/update-score', 'Teacher\PageController@updateScore')->name('update.score');  


	Route::get('/assessment', 'LicenseCardController@index');
    Route::post('/proceed', 'QuestionAnswerController@proceed')->name('user.proceed');
    Route::post('/pif-question', 'PIFController@pifQuestion')->name('pif.question');
    // Route::post('/re-take', 'QuestionAnswerController@resetAnswer')->name('reset.answer');

    Route::get('/tif/{question}', 'PIFController@show')->name('tif.show');
    Route::get('/tif-followup/{followupQuestion}', 'PIFController@followupQuestion')->name('tif.followup');
    Route::post('/tif-followup/{followupQuestion}', 'PIFAnswerController@followupQuestion')->name('tif-followup.store');
    Route::post('/tif-answers', 'PIFAnswerController@store')->name('tif.store');

    Route::get('/license-card', 'HomeController@license')->name('license.card');
    Route::post('/license-card', 'LicenseCardController@store')->name('create.card');

    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plans/{plan}', 'PlanController@show')->name('plans.show');
    
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
    Route::get('/subscribed/{plan}', 'SubscriptionController@show')->name('subscribed.show');

    Route::get('/question/{question}', 'QuestionController@show')->name('question.show');
    Route::get('/followup/{followupQuestion}', 'QuestionController@followupQuestion')->name('followup.question');
    Route::post('/followup/{followupQuestion}', 'QuestionAnswerController@followupQuestion')->name('followup.store');

    Route::resource('/answers', 'QuestionAnswerController');
    Route::get('/edit-profile', 'ProfileController@index');
    Route::put('/update-profile', 'ProfileController@update')->name('update.profile');
    Route::get('/user/pdfexport', 'ProfileController@pdfExport');
    Route::get('/edit-email', 'ProfileController@editEmail');
    Route::put('/update-email', 'ProfileController@updateEmail')->name('update.email');
});

/*
|----------------------------------------------------------------------------
| Teacher Routes
|----------------------------------------------------------------------------
|
| All routes for teacher user
|
*/

Route::name('teacher.')->prefix('teacher')->middleware(['auth', 'verified', 'twofactor', 'teacher'])->group(function() {  

    Route::get('/welcome', 'Users\Teacher\WelcomeController@index')->name('welcome');  
    Route::put('/score', 'Users\Teacher\WelcomeController@score')->name('score');

    Route::get('/question/{question}', 'Users\Teacher\QuestionController@show')->name('question');
    Route::post('/question/{question}', 'Users\Teacher\QuestionController@store')->name('question');

    Route::get('/followup/{followupQuestion}', 'Users\Teacher\FollowUpQuestionController@show')->name('followup');
    Route::post('/followup/{followupQuestion}', 'Users\Teacher\FollowUpQuestionController@store')->name('followup');

    Route::get('/assessment', 'Users\Teacher\AssessmentController@index');

    Route::get('/tif/{question}', 'Users\Teacher\TIFQuestionController@show')->name('tif');
    Route::post('/tif/{question}', 'Users\Teacher\TIFQuestionController@store')->name('tif');

    Route::get('/tif/followup/{followupQuestion}', 'Users\Teacher\TIFFollowupQuestionController@show')->name('tif.followup');
    Route::post('/tif/followup/{followupQuestion}', 'Users\Teacher\TIFFollowupQuestionController@store')->name('tif.followup');
    
    Route::post('/proceed', 'Users\Teacher\AssessmentController@proceed')->name('proceed');

    Route::get('/license-card', 'Users\Teacher\LicenseCardController@index')->name('card');
    Route::post('/license-card', 'Users\Teacher\LicenseCardController@store')->name('card');
});

/*
|----------------------------------------------------------------------------
| Login Socialite
|----------------------------------------------------------------------------
|
| Login through facebook and google
|
*/
Route::get('/facebook/redirect', 'SocialAuthFacebookController@redirect')->name('login.facebook');
Route::get('/facebook/callback', 'SocialAuthFacebookController@callback');

Route::get('/google/redirect', 'SocialAuthGoogleController@redirect')->name('login.google');
Route::get('/google/callback', 'SocialAuthGoogleController@callback');

Route::get('/linkedin/redirect', 'SocialAuthLinkedinController@redirect')->name('login.linkedin');
Route::get('/linkedin/callback', 'SocialAuthLinkedinController@callback');


//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Route cache:
Route::get('/migrate-database', function() {
    $exitCode = Artisan::call('migrate');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Clear Config cache:
Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/{scope}', 'HomeController@scopeProfile');