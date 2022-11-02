<?php

namespace App\Http\Controllers\Auth;

use App\Page;
use App\User;
use App\ScopeID;
use App\AnswerScore;
use App\LicenseCard;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\AdminNotifyRegisterTeacher;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'role' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            // 'g-recaptcha-response' => ['required', 'captcha']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $role = Role::where('name', $data['role'])->first();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        AnswerScore::create([
            'user_id' => $user->id
        ]);

        $scope = $this->generateScopeID();

        ScopeID::create([
            'scope' => $scope,
            'user_id' => $user->id,
        ]);

        $user->assignRole($role);

        $users = User::role('admin')->get();

        foreach ($users as $admin) {
            $admin->notify(new AdminNotifyRegisterTeacher());
        }

        auth()->login($user);
        
        return $user;
    }

    /**
     * Generate scope ID
     *
     */
    public function generateScopeID() {
        $scope = mt_rand(10000000, 99999999). '-' .mt_rand(1000, 9999). '-' .mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->scopeIDExist($scope)) {
            return $this->generateScopeID();
        }

        // otherwise, it's valid and can be used
        return $scope;
    }

    /**
     * Check if Scope ID is exists
     * @param $scope id
     */

    public function scopeIDExist($scope) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return ScopeID::where('scope', $scope)->exists();
    }

    /**
     * Show Registration Form with data of pages. For Dynamic Pages
     *
     */
    public function showRegistrationForm()
    {
        $pages = Page::all();

        return view('auth.register', compact('pages')); 
    }
}
