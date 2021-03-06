<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
