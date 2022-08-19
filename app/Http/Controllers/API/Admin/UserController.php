<?php

namespace App\Http\Controllers\API\Admin;

use App\User;
use App\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorporateMailConfirmation;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:admin', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->with(['card.licenseCategory', 'card.tif', 'answerScore', 'roles'])->paginate(50);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function academia()
    {
        return User::whereHas('roles', function ($query) {
            return $query->where('name', 'academia');
        })->latest()->with(['card.licenseCategory', 'card.tif', 'answerScore', 'roles'])->paginate(50);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacher()
    {
        return User::whereHas('roles', function ($query) {
            return $query->where('name', 'teacher');
        })->latest()->with(['card.licenseCategory', 'card.tif', 'answerScore', 'roles'])->paginate(50);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function undergrad()
    {
        return User::whereHas('roles', function ($query) {
            return $query->where('name', 'undergrad');
        })->latest()->with(['card.licenseCategory', 'card.tif', 'answerScore', 'roles'])->paginate(50);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return User::whereHas('roles', function ($query) {
            return $query->where('name', 'admin');
        })->latest()->with(['card.licenseCategory', 'card.tif', 'answerScore', 'roles'])->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:25',
            'email'=>'required|string|email|max:255|unique:users',
            'username'=>'required|string|max:255|unique:users'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('username'),
            'password' => Hash::make(Str::random(32))
        ]);
        $user->save();

        $user->assignRole('corporate');

        // Verify User Token
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        // send email to corporate user to login
        Mail::to($user)->send(new CorporateMailConfirmation($user));

        return ['message' => 'User Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);

        // $request->validate([
        //     'name'=>'required|string|max:25',
        //     'email'=>'required|string|email|max:255|unique:users,email,'.$user->id,
        //     'username'=>'required|string|max:255|unique:users,username,'.$user->id
        // ]);

        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->username = $request->get('username');
        // $user->save();

        // return ['message' => 'User Created!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        foreach ($user->socialites as $socialite) {
            $socialite->destroy($socialite->id);
        }
        // return $user->socialites;

        $user->email = $user->email . '_deleted' . uniqid();
        $user->username = $user->username . '_deleted' . uniqid();

        $user->save();

        $user->destroy($user->id);
        
        return ['message' => 'User Deleted!'];
    }
}
