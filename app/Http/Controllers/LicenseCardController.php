<?php

namespace App\Http\Controllers;

use App\AIF;
use App\Page;
use App\LicenseCard;
use App\QuestionAnswer;
use App\AcademiaCategory;
use Illuminate\Http\Request;
use App\Notifications\ScopePublicProfile;

class LicenseCardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:academia', 'verified', 'twofactor']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages = Page::all(); // list of pages
        $user = auth()->user(); // Logged in user
        $card = $user->card; // license card
        $answerScore = $user->answerScore; // user score

        if($user->questionAnswer->isEmpty())
        {
            return redirect()->to('/academic/welcome');
        }
        
        if ($answerScore->is_done_question == true) {
            return redirect()->to('license-card');
        }

        $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $points = 0; // set the points to 0

        foreach ($answers as $answer) {
            $points = $answer->points + $points; // set the total points
        }

        $categories = AcademiaCategory::all(); // get all the license categories

        foreach ($categories as $category) {
            if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
                if ($category->id == 10) {
                    $data = AcademiaCategory::findOrFail(9); // set the data
                } else {
                    $data = $category;
                }
                
            } // find the category by points.
        }

        $pifAnswers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $pifPoints = 0; // set the points to 0
        $dataPif = '';

        $tifs = AIF::all();

        if ($pifAnswers) {
            foreach ($pifAnswers as $pifAnswer) {
                $pifPoints = $pifAnswer->points + $pifPoints; // set the total points
            }

            foreach ($tifs as $tif) {
                if ($pifPoints >= $tif->points_minimum && $pifPoints <= $tif->points_maximum) {
                    $dataPif = $tif;
                }
            }
        }
        

        return view('license.congratulations', compact(['pages', 'data', 'categories', 'dataPif', 'tifs'])); // return to home
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
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required|string|max:255',
        ]); // validation

        $photoName = 'default.jpg';

        if ($request->hasFile('photo')){
            $photoName = time().'.'.request()->photo->getClientOriginalExtension();
            
            request()->photo->move(public_path('assets/images/user'), $photoName);
        } // if has photo.

        $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $points = 0; // set the points to 0

        foreach ($answers as $answer) {
            $points = $answer->points + $points; // set the total points
        }

        $categories = AcademiaCategory::all(); // get all the license categories

        foreach ($categories as $category) {
            if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
                if ($category->id == 10) {
                    $data = AcademiaCategory::findOrFail(9); // set the data
                } else {
                    $data = $category;
                }
            } // find the category by points.
        }

        $tifAnswers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $tif_points = 0; // set the points to 0

        foreach ($tifAnswers as $tifAnswer) {
            $tif_points = $tifAnswer->points + $tif_points; // set the total points
        }

        $tifs = AIF::all(); // get all the license categories

        foreach ($tifs as $tif) {
            if ($tif_points >= $tif->points_minimum && $tif_points <= $tif->points_maximum) {
                $dataTif = $tif; // set the data
            } // find the category by points.
        }

        $user = auth()->user();

        if($request->get('name')) { // if user change his/her name
            $user->name = $request->get('name');
            $user->save(); // logged in user change name saved.
        }

        if (!$data) {
            $data = null;
        }

        if (!$dataTif) {
            $dataTif = null;
        }
        
        $card = new LicenseCard([
        	'user_id' => $request->user()->id,
            'gender' => $request->get('gender'),
            'photo' =>  $photoName,
            'title' => $request->get('title'),
            'academic_title' => $request->get('academic_title'),
            'citizenship' => $request->get('citizenship'),
            'academia_id' => $data->id,
            'aif_id' => $dataTif->id,
        ]); // set the data in license card

        $card->save(); // save card

        auth()->user()->notify(new ScopePublicProfile($user, $user->scope));

        return redirect()->to('/academia/dashboard'); // return to dashboard
    }
}
