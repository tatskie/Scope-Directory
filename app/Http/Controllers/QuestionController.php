<?php

namespace App\Http\Controllers;

use App\Page;
use App\Question;
use App\QuestionAnswer;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class QuestionController extends Controller
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
            return redirect()->intended('/academic/welcome');
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
                    return redirect()->route('followup.question', $followupQuestion->url);
                }
            }
            
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })->where('impact_factor', false)
                            ->where('id', '>', $hasAnswer->question->id)
                            ->first();

            if ($nextQuestion) {
                return redirect()->route('question.show', $nextQuestion->url); // return if user has answer
            }
            return redirect()->to('assessment');
        }

        // list of pages
        $pages = Page::all();
        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', false)->get();
        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)->orderBy('id', 'desc')->first();

        $number = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })->where('impact_factor', false)->where('id','<', $question->id)->count() + 1;
        
        return view('questions.show', compact(['question', 'pages', 'questions', 'lastQuestion', 'number']));
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
        $journals = \App\Journal::all();
        $role = $user->roles->first()->name;

        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                     })
                     ->where('impact_factor', false)
                     ->get();

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->orderBy('id', 'desc')
                        ->first();

        $number = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                      $query->where('roles', '=', $role);
                  })
                  ->where('impact_factor', false)
                  ->where('id','<', $followupQuestion->question_id)
                  ->count() + 1;

        if (!$user->answerScore->is_agree == true) {
            return redirect()->intended('/academic/welcome');
        }

        $hasAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $followupQuestion->question_id, 'followup_id' => $followupQuestion->id])->first(); // find the if user has answer

        if($hasAnswer)
        {
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', false)
                            ->where('id', '>', $hasAnswer->question->id)
                            ->first();
            if ($nextQuestion) {
              return redirect()->route('question.show', $nextQuestion->url); // return if user has answer
            }
            return redirect()->to('assessment');
        }

        return view('questions.followup', compact(['followupQuestion', 'pages', 'questions', 'lastQuestion', 'number', 'journals']));
    }
}
