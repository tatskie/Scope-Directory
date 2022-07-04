<?php

namespace App\Http\Controllers\Undergrad;

use App\Page;
use App\Country;
use App\Question;
use App\LicenseCard;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class LicenceCardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:undergrad', 'verified', 'twofactor']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $countries = Country::all(); // list of countries
        $role = $user->roles->first()->name;
        $hasCard = LicenseCard::where('user_id', $user->id)->get();
        $answerScore = $user->answerScore; // user score

        if ($answerScore->is_done_question == false) {
            return redirect()->to('/undergrad-assessment');
        }

        if(!$hasCard->isEmpty())
        {
            return redirect()->back(); // return if user has card
        }
        
        if(auth()->user()->questionAnswer->isEmpty()) {

            $firstQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('is_pif', false)
                            ->orderBy('id', 'asc')
                            ->first();

            return redirect()->route('sif.question', $firstQuestion->slug);
        }


        $lastQuestionAnswer = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first(); // Last Question who answered for user

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->orderBy('id', 'desc')
                        ->first(); // find the Last Question
        
        if($lastQuestionAnswer->question->id != $lastQuestion->id) // determine if not the last question
        {   
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })->where('impact_factor', false)
                            ->where('id', '>', $lastQuestion->id)
                            ->first(); // Next Question
                            
            return redirect()->route('sif.question', $nextQuestion->url); // redirect to next question
        }

        $pages = Page::all();

        return view('undergrad.license.index', compact(['pages', 'countries']));
    }

    /**
     * Proceed and agree with the license category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proceed(Request $request)
    {

        $request->validate([
            'proceed_answer'=> 'required',
        ]); // validate the answer input

        if ($request->get('proceed_answer') != true) {
            return redirect()->back();
        }
        
        $user = auth()->user(); // Logged in user
        $answerScore = $user->answerScore; // user score

        $answerScore->is_done_question = 1; // user is done with the questions

        $answerScore->save(); // reset score

        return redirect()->to('/undergrad-license-card'); // redirect license form
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
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2111775',
            'name'=>'required|string|max:255',
        ]); // validation

        $photoName = 'default.jpg';

        if ($request->hasFile('photo')){
            $photoName = time().'.'.request()->photo->getClientOriginalExtension();
            
            request()->photo->move(public_path('assets/images/user'), $photoName);
        } // if has photo.

        // $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

        // $points = 0; // set the points to 0

        // foreach ($answers as $answer) {
        //     $points = $answer->points + $points; // set the total points
        // }

        // $categories = LicenseCategory::all(); // get all the license categories

        // foreach ($categories as $category) {
        //     if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
        //         $data = $category; // set the data
        //     } // find the category by points.
        // }

        // $tifAnswers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

        // $tif_points = 0; // set the points to 0

        // foreach ($tifAnswers as $tifAnswer) {
        //     $tif_points = $tifAnswer->points + $tif_points; // set the total points
        // }

        // $tifs = TIF::all(); // get all the license categories

        // foreach ($tifs as $tif) {
        //     if ($tif_points >= $tif->points_minimum && $tif_points <= $tif->points_maximum) {
        //         $dataTif = $tif; // set the data
        //     } // find the category by points.
        // }

        if($request->get('name')) { // if user change his/her name
            $user = auth()->user();

            $user->name = $request->get('name');
            $user->save(); // logged in user change name saved.
        }

        $card = new LicenseCard([
        	'user_id' => $request->user()->id,
            'gender' => $request->get('gender'),
            'photo' =>  $photoName,
            'title' => $request->get('title'),
            // 'date_of_birth' => $request->get('date_of_birth'),
            'citizenship' => $request->get('citizenship'),
            // 'category_id' => $data->id,
            // 'tif_id' => $dataTif->id,
        ]); // set the data in license card

        $card->save(); // save card

        return redirect()->to('/undergrad/dashboard'); // return to dashboard
    }
}
