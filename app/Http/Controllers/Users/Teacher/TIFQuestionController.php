<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class TIFQuestionController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:teacher', 'verified', 'twofactor']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $user = auth()->user(); // user who logged in

        $role = $user->roles->first()->name;

        if (!$user->answerScore->is_agree == true) {
            return redirect()->intended('/teacher/welcome');
        }

        if ($user->answerScore->is_done_tif == true) {
            return redirect()->intended('/teacher/assessment');
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
                    return redirect()->route('teacher.tif.followup', $followupQuestion->url);
                }
            }
            
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', true)
                            ->where('id', '>', $hasAnswer->question->id)
                            ->first();

            return redirect()->route('teacher.tif', $nextQuestion->url); // return if user has answer
        }

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

        return view('users.teacher.tif.index', compact(['question', 'questions', 'lastQuestion', 'number']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user(); // user who logged in
        $role = $user->roles->first()->name;
        $question = Question::findOrFail($request->get('question_id')); // Get the question data
        $hasAnswer = QuestionAnswer::where('is_tif', true)->where(['user_id' => $user->id, 'question_id' => $question->id])->first(); // find the if user has answer

        $points = 0;
        $validation = '';
        $value = false;

        if ($question->code_id == '1') {

            if ($request->get('answer') == true) {
                $choice = $question->questionChoices->where('label', 'Yes')->first();
                $points = $choice->points;
                $value = true;
            }else {
                $choice = $question->questionChoices->where('label', 'No')->first();
                $points = $choice->points;
                $value = false;
            }

        } elseif ($question->code_id == '2'){
            $value = true;
            $validation = 'required';
            $points = $request->get('answer');

        } elseif ($question->code_id == '3'){
            $value = true;
            $validation = 'required|string';
            $choice = $question->questionChoices->first();
            $points = $choice->points;

        } elseif ($question->code_id == '4'){
            $value = true;
            $validation = 'required|integer';
            $points = $request->get('answer');

        } elseif ($question->code_id == '5'){
            $points = 0;
            $value = true;
            if ($request->get('answer')) {
                foreach ($request->get('answer') as $answer) {
                    $points = $points + $answer;
                }
            }

        } else {
            return redirect()->back();
        }

        $request->validate([
            'answer'=> $validation,
        ]); // validate the answer input

        if($hasAnswer)
        {
            $lastAnswer = QuestionAnswer::where('is_tif', true)->orderBy('id', 'desc')->first();
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', true)
                            ->where('id', '>', $lastAnswer->question->id)
                            ->first();

            if(!$nextQuestion)
            {
                $answers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

                $points = 0; // set the points to 0

                foreach ($answers as $answer) {
                    $points = $answer->points + $points; // set the total points
                }

                AnswerScore::where('user_id', $request->user()->id)->update([
                    'tif_points' => $points,
                    'is_done_tif' => true
                ]);

                return redirect()->to('/teacher/assessment'); // If no more Questions Redirect to License Card
            }

            return redirect()->route('teacher.tif', $nextQuestion->url); // return if user has answer
        }

        // Create Answer for user
        $answer = new QuestionAnswer([
            'user_id' => $request->user()->id,
            'question_id' => $question->id,
            'is_yes' => $value,
            'points' => $points,
            'is_tif' => true
        ]);

        $answer->save(); // Answer Saved

        AnswerScore::where('user_id', $request->user()->id)->update([
            'score_id' => $answer->id
        ]);

        $followupQuestion = $answer->question->followupQuestion;

        if ($answer->is_yes == 1) {
            if ($followupQuestion) {
                 foreach ($followupQuestion as $followup) {
                    $hasFollowupAnswer = QuestionAnswer::where([
                        'user_id' => $user->id,
                        'question_id' => $question->id,
                        'followup_id' => $followup->id
                    ])->first(); // find the if user has followup answer

                    if (!$hasFollowupAnswer) {
                        return redirect()->route('teacher.tif.followup', $followup->url);
                    }
                }
            }
        }
        

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', true)
                        ->where('id', '>', $question->id)
                        ->first();

        if(!$lastQuestion)
        {
            $answers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

            $points = 0; // set the points to 0

            foreach ($answers as $answer) {
                $points = $answer->points + $points; // set the total points
            }

            AnswerScore::where('user_id', $request->user()->id)->update([
                'tif_points' => $points,
                'is_done_tif' => true
            ]);

            return redirect()->to('/teacher/assessment'); // If no more Questions Redirect to License Card
        }

        return redirect()->route('teacher.tif', $lastQuestion->url)->with(['question']);

    
    }
}
