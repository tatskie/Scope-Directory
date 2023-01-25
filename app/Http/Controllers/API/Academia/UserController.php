<?php

namespace app\Http\Controllers\API\Academia;

use PDF;
use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:academia', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = auth()->user();

        // return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified user profile.
     *
     */
    public function paymentComlete(Request $request)
    {
        $data = $request->all();

        echo "<prev>";
        print_r($data);
    }

    /**
     * Display the lists of country.
     *
     */
    public function country()
    {
        return Country::all();
    }

    /**
     * Display the specified user profile.
     *
     */
    public function profile()
    {
        return auth('api')->user()->load(['card.aif', 'card.academiaCategory', 'receipts', 'scope']);
    }

    /**
     * Display the specified created_at.
     *
     */
    public function yearAndMonth()
    {   
        // $year = Carbon::createFromFormat('Y-m-d H:i:s', auth('api')->user()->created_at)->format('Y');
        // $month = Carbon::createFromFormat('Y-m-d H:i:s', auth('api')->user()->created_at)->format('m');
        $id = auth('api')->user()->id;

        $collection = collect(['id' => encrypt($id)]);
        return $collection;
    }

    /**
     * Export To PDF.
     *
     */
    public function pdfExport()
    {
        $user = auth()->user(); // Logged in user
        $card = $user->card; // card details
        $pdf = PDF::loadView('profile.pdf', ['card' => $card, 'user' => $user])->setPaper('a4', 'portrait');

        $fileName = $user->name;

        return $pdf->stream($fileName . '.pdf');
    }

    /**
     * Display the license category.
     *
     */
    public function licenseCategory()
    {
        return auth('api')->user()->card->academiaCategory;
    }

    /**
     * Display the TIF Level.
     *
     */
    public function tifLevel()
    {
        return auth('api')->user()->card->aif;
    }

    /**
     * Display the specified user profile.
     *
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $card = $user->card;

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email,'.$user->id,
            'username'=>'required|regex:/^\S*$/u|max:255|unique:users,username,'.$user->id,
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');

        $user->save(); // user update data

        $card->gender = $request->get('gender');
        $card->title = $request->get('title');
        $card->citizenship = $request->get('citizenship');

        $card->save();

        return ['message' => "Success"];
        
    }

    /**
     * Display the specified user profile.
     *
     */
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            // 'password'=>'required|string|max:255',
            'new_password'=>'required|string|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ]);

        // if (!Hash::check($request->get('password'), $user->password)) {
        //     return ['isvalid'=>false, 'errors' => [
        //         'notMatch' => 'Current password does not match!'
        //     ]];
        // }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return ['isvalid'=>true, 'message' => "Password Changed Successfully!"];
        
    }

    /**
     * Update The Profile Photo
     *
     */
    public function updatePhoto(Request $request)
    {
        $card = auth('api')->user()->card;
        $currentPhoto = $card->photo;

        if ($request->photo != $currentPhoto) {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('assets/images/user/').$name);
        }

        $card->update(['photo' => $name]);

        return ['message' => "Success"];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
