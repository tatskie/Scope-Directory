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

Auth::routes();
Auth::routes(['verify' => true]);

// register
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

Route::get('/TLP-209315-{user}', 'HomeController@scopeProfile');

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice'); 
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend'); 
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');

Route::get('/users/verify/{token}', 'VerifyEmailController@verifyUser');
Route::get('/reset/password/{token}', 'VerifyEmailController@reset')->name('reset');
Route::post('/reset/password/{token}', 'VerifyEmailController@resetPassword')->name('update.password');

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
    // Route::get('/followup/{followupQuestion}', 'QuestionController@followupQuestion')->name('followup.question');

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

    // academia
    // Route::get('/academia-welcome', 'Academia\DashboardController@welcomeUser'); 
    // Route::get('/academia-assessment', 'Academia\AssessmentController@index'); 

    // Academia Question
    // Route::put('/proceed-question', 'Academia\DashboardController@proceedQuestion')->name('proceed.question'); 
    // Route::get('/academia-question/{question}', 'Academia\QuestionController@show')->name('academia.question');
    // Route::post('/academia-question/{question}', 'Academia\QuestionAnswerController@store')->name('academia.question');
    // Route::get('/academia-followup/{followupQuestion}', 'Academia\QuestionController@followupQuestion')->name('academia.followup');
    // Route::post('/academia-followup/{followupQuestion}', 'Academia\QuestionAnswerController@followupQuestion')->name('academia.followup');

    // Academia AIF Question
    // Route::post('/aif-question', 'Academia\AIFController@pifQuestion')->name('aif.proceed');
    // Route::get('/academia-aif/{question}', 'Academia\AIFController@show')->name('aif.question');
    // Route::post('/academia-aif/{question}', 'Academia\AIFAnswerController@store')->name('aif.question');
    // Route::get('/academia-followup-aif/{followupQuestion}', 'Academia\AIFController@followupQuestion')->name('aif.followup');
    // Route::post('/academia-followup-aif/{followupQuestion}', 'Academia\AIFAnswerController@followupQuestion')->name('aif.followup');

    // License Card
    // Route::post('/academia-proceed', 'Academia\LicenceCardController@proceed')->name('academia.proceed');
    // Route::get('/academia-license-card', 'Academia\LicenceCardController@index')->name('academia.card');
    // Route::post('/academia-license-card', 'Academia\LicenceCardController@store')->name('academia.card');

     // undergrad
    // Route::get('/undergrad-welcome', 'Undergrad\DashboardController@welcomeUser'); 
    // Route::get('/undergrad-assessment', 'Undergrad\AssessmentController@index');

    // Undergrad Question
    // Route::put('/proceed-undergrad', 'Undergrad\DashboardController@proceedQuestion')->name('proceed.undergrad'); 
    // Route::get('/undergrad-question/{question}', 'Undergrad\QuestionController@show')->name('undergrad.question');
    // Route::post('/undergrad-question/{question}', 'Undergrad\QuestionAnswerController@store')->name('undergrad.question');
    // Route::get('/undergrad-followup/{followupQuestion}', 'Undergrad\QuestionController@followupQuestion')->name('undergrad.followup');
    // Route::post('/undergrad-followup/{followupQuestion}', 'Undergrad\QuestionAnswerController@followupQuestion')->name('undergrad.followup');

    // Undergrad Impact Factor Question
    // Route::post('/sif-question', 'Undergrad\SIFController@pifQuestion')->name('sif.proceed');
    // Route::get('/undergrad-sif/{question}', 'Undergrad\SIFController@show')->name('sif.question');
    // Route::post('/undergrad-sif/{question}', 'Undergrad\SIFAnswerController@store')->name('sif.question');
    // Route::get('/undergrad-followup-sif/{followupQuestion}', 'Undergrad\SIFController@followupQuestion')->name('sif.followup');
    // Route::post('/undergrad-followup-sif/{followupQuestion}', 'Undergrad\SIFAnswerController@followupQuestion')->name('sif.followup');

    // License Card
    // Route::post('/undergrad-proceed', 'Undergrad\LicenceCardController@proceed')->name('undergrad.proceed');
    // Route::get('/undergrad-license-card', 'Undergrad\LicenceCardController@index')->name('undergrad.card');
    // Route::post('/undergrad-license-card', 'Undergrad\LicenceCardController@store')->name('undergrad.card');
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