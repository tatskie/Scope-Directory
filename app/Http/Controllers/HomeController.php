<?php

namespace App\Http\Controllers;

use App\Page;
use App\Country;
use App\Question;
use App\LicenseCard;
use App\QuestionAnswer;
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
        $this->middleware(['auth', 'verified']);
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
        $card = $user->card;

        if($user->questionAnswer->isEmpty())
        {
            return redirect()->to('/welcome');
        }
        
        return view('home', compact(['pages', 'card'])); // return to home
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

        $pages = Page::all();

        return view('license.index', compact(['pages', 'countries']));
    }
}
