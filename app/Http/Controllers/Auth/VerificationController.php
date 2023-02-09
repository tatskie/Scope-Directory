<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = '/teacher/dashboard';
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

        if (auth()->user()->hasRole('journal')) {
           return '/journal/dashboard';
        }

        if (auth()->user()->hasRole('editor')) {
           return '/editor/dashboard';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
