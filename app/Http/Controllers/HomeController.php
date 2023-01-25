<?php

namespace App\Http\Controllers;

use App\AIF;
use App\User;
use App\Page;
use App\ScopeID;
use App\Country;
use App\Question;
use App\LicenseCard;
use App\QuestionAnswer;
use App\AcademiaCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $role = $user->roles->first()->name;
        $aifs = AIF::orderBy('id', 'desc')->get();
        $categories = AcademiaCategory::all();

        if ($user->answerScore->is_agree == true) {

            $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->orderBy('id', 'asc')
                        ->first();

            return redirect()->route('question.show', $question->url);
        }

        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', false)
                    ->get();

        $pif = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', true)
                    ->get();

        $total = count($questions);
        $totalPif = count($pif);
        $pages = Page::all();
        
        return view('teacher.welcome-user', compact(['pages', 'total', 'aifs', 'categories', 'totalPif']));
    }

    /**
     * Show the application licence card.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function license()
    {
        $user = auth()->user();
        $countries = Country::all(); // list of countries
        $role = $user->roles->first()->name;
        $hasCard = LicenseCard::where('user_id', $user->id)->get();
        $answerScore = $user->answerScore; // user score

        if ($answerScore->is_done_question == false) {
            return redirect()->to('assessment');
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

            return redirect()->route('question.show', $firstQuestion->slug);
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
                            
            return redirect()->route('question.show', $nextQuestion->url); // redirect to next question
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
                    $data = AcademiaCategory::findOrFail(4); // set the data
                } else {
                    $data = $category;
                }
                
            } // find the category by points.
        }

        $pages = Page::all();

        return view('license.index', compact(['pages', 'countries', 'data']));
    }

    public function scopeProfile($scope) {

        $scopeProfile = ScopeID::where('scope', $scope)->first();

        $user = User::findOrFail($scopeProfile->user_id);

        if ($user->hasRole('academia')) {
            if (!$user or !$user->card->academiaCategory) {
                abort(404);
            }
        }

        if ($user->hasRole('teacher')) {
            if (!$user or !$user->card->licenseCategory) {
                abort(404);
            }
        }
        
        return view('profile', compact(['user', 'scopeProfile']));
    }
}
