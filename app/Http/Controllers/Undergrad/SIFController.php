<?php

namespace App\Http\Controllers\Undergrad;

use App\Page;
use App\Question;
use App\QuestionAnswer;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class SIFController extends Controller
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
     * Reset The question answers of user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pifQuestion(Request $request)
    {
        $request->validate([
            'proceed_pif'=> 'required',
        ]); // validate the answer input

        $user = auth()->user(); // Logged in user

        $role = $user->roles->first()->name;

        if ($request->get('proceed_pif') != true) {
            return redirect()->back();
        }

        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', true)
                    ->first();

        return redirect()->route('sif.question', $question->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // $question = Question::findOrFail($url);

        $user = auth()->user(); // user who logged in

        $role = $user->roles->first()->name;

        if (!$user->answerScore->is_agree == true) {
            return redirect()->intended('/undergrad-welcome');
        }

        if ($user->answerScore->is_done_tif == true) {
            return redirect()->intended('/assessment');
        }

        $hasAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $question->id])->first(); // find the if user has answer

        if($hasAnswer)
        {
            foreach ($question->followupQuestion as $followupQuestion) {
                $hasFollowupAnswer = QuestionAnswer::where([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'followup_id' => $followupQuestion->id
                ])->first(); // find the if user has followup answer

                if (!$hasFollowupAnswer) {
                    return redirect()->route('sif.followup', $followupQuestion->url);
                }
            }
            
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', true)
                            ->where('id', '>', $hasAnswer->question->id)
                            ->first();

            return redirect()->route('sif.question', $nextQuestion->url); // return if user has answer
        }

        // list of pages
        $pages = Page::all();
        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                     })
                     ->where('impact_factor', true)
                     ->get();

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', true)
                        ->orderBy('id', 'desc')
                        ->first();

        $number = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                      $query->where('roles', '=', $role);
                  })
                  ->where('impact_factor', true)
                  ->where('id','<', $question->id)
                  ->count() + 1;
        
        return view('undergrad.sif.show', compact(['question', 'pages', 'questions', 'lastQuestion', 'number']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @param  \App\FollowupQuestion  $followupQuestion
     */
    public function followupQuestion(FollowupQuestion $followupQuestion)
    {
        // list of pages
        $pages = Page::all();
        $user = auth()->user(); // user who logged in
        $role = $user->roles->first()->name;

        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                         $query->where('roles', '=', $role);
                     })
                     ->where('impact_factor', true)
                     ->get();

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                           $query->where('roles', '=', $role);
                       })
                       ->where('impact_factor', true)
                       ->orderBy('id', 'desc')
                       ->first();

        $number = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                      $query->where('roles', '=', $role);
                  })
                  ->where('impact_factor', true)
                  ->where('id','<', $followupQuestion->question_id)
                  ->count() + 1;

        if (!$user->answerScore->is_agree == true) {
            return redirect()->intended('/undergrad-welcome');
        }

        if ($user->answerScore->is_done_tif == true) {
            return redirect()->intended('/undergrad-assessment');
        }

        $hasAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $followupQuestion->question_id, 'followup_id' => $followupQuestion->id])->first(); // find the if user has answer

        if($hasAnswer)
        {
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', true)
                            ->where('id', '>', $hasAnswer->question->id)
                            ->first();

            return redirect()->route('sif.question', $nextQuestion->url); // return if user has answer
        }

        return view('undergrad.sif.followup', compact(['followupQuestion', 'pages', 'questions', 'lastQuestion', 'number']));
    }
}
