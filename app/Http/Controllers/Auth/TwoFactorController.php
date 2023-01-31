<?php

namespace App\Http\Controllers\Auth;

use App\Page;
use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use App\Services\WelcomeService;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Database\Eloquent\Builder;

class TwoFactorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('auth.twoFactor', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, WelcomeService $service)
    {
        $request->validate([
            'two_factor_code' => 'integer|required',
        ]);

        $user = auth()->user();

        $role = $user->roles->first()->name;
        
        if($request->input('two_factor_code') == $user->two_factor_code)
        {
            $user->resetTwoFactorCode();

            // Academic User
            if ($user->hasRole('academia')) {
                if (!$user->answerScore->is_agree == true) {
                    return redirect()->to('/academic/welcome');
                }
                else {
                    if (is_null($user->answerScore->score_id)) {
                        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'asc')
                                    ->first();
                        return redirect()->route('question.show', $question->url);
                    }
                }
                
                if(!$user->card){

                    $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                
                    if ($user->answerScore->questionAnswer->question_id != $lastQuestion->id) {

                        $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                            $query->where('roles', '=', $role);
                                        })
                                        ->where('impact_factor', false)
                                        ->where('id', '>', $user->answerScore->questionAnswer->question_id)
                                        ->first();

                            if(!$nextQuestion) {
                                $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

                                $points = 0; // set the points to 0

                                foreach ($answers as $answer) {
                                    $points = $answer->points + $points; // set the total points
                                }

                                AnswerScore::where('user_id', $request->user()->id)->update([
                                    'total_points' => $points
                                ]);

                                return redirect()->to('/assessment'); // If no more Questions Redirect to License Card
                            }

                        return redirect()->route('question.show', $nextQuestion->url);

                    }
                    return redirect()->to('/license-card');
                }

                return redirect()->to('academia/dashboard');
            } // user role academia

            // Teacher User
            if ($user->hasRole('teacher')) {
                if (!$user->answerScore->is_agree == true) {
                    return redirect()->to('/teacher/welcome');
                }
                else {
                    if (is_null($user->answerScore->score_id)) {
                        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'asc')
                                    ->first();
                        return redirect()->route('teacher.question', $question->url);
                    }
                }
                
                if(!$user->card){

                    $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                
                    if ($user->answerScore->questionAnswer->question_id != $lastQuestion->id) {

                        $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                            $query->where('roles', '=', $role);
                                        })
                                        ->where('impact_factor', false)
                                        ->where('id', '>', $user->answerScore->questionAnswer->question_id)
                                        ->first();

                            if(!$nextQuestion) {
                                $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

                                $points = 0; // set the points to 0

                                foreach ($answers as $answer) {
                                    $points = $answer->points + $points; // set the total points
                                }

                                AnswerScore::where('user_id', $request->user()->id)->update([
                                    'total_points' => $points
                                ]);

                                return redirect()->to('/teacher/assessment'); // If no more Questions Redirect to License Card
                            }

                        return redirect()->route('teacher.question', $nextQuestion->url);

                    }
                    return redirect()->to('/license-card');
                }

                return redirect()->to('teacher/dashboard');
            } // user role teacher

            if ($user->hasRole('journal')) {
                return redirect()->to('journal/dashboard');
            }
        
            if ($user->hasRole('admin')) {
                return redirect()->to('admin/dashboard');
            }

            if ($user->hasRole('corporate')) {
                return redirect()->to('corporate/dashboard');
            }
        }

        return redirect()->back()->withErrors(['two_factor_code' => 'The two factor code you have entered does not match']);
    }

    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());

        return redirect()->back()->withMessage('The two factor code has been sent again');
    }
}
