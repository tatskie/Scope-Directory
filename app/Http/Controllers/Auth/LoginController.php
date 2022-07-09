<?php

namespace App\Http\Controllers\Auth;

use App\Page;
use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
        if (\Session::has('userRequest')) {
            return route('request');
        }
        if (auth()->user()->hasRole('academia')) {
            return '/academia/dashboard';
        }

        if (auth()->user()->hasRole('teacher')) {
            return '/teacher/dashboard';
        }

        if (auth()->user()->hasRole('admin')) {
           return '/admin/dashboard';
        }

        if (auth()->user()->hasRole('corporate')) {
           return '/corporate/dashboard';
        }
    }
    // protected $redirectTo = '/teacher/dashboard';

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * Show Login Form with data of pages. For Dynamic Pages
     *
     */
    public function showLoginForm()
    {
        $pages = Page::all();

        return view('auth.login', compact('pages'));
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    }
    
    public function apiLogin(Request $request) {
        
        return $request;
    }
}
