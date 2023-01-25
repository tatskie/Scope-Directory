<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class TIFFollowupQuestionController extends Controller
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
     * @param  \App\FollowupQuestion  $followupQuestion
     */
    public function show(FollowupQuestion $followupQuestion)
    {
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
            return redirect()->intended('/teacher/welcome');
        }

        if ($user->answerScore->is_done_tif == true) {
            return redirect()->intended('/teacher/assessment');
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

            return redirect()->route('teacher.tif', $nextQuestion->url); // return if user has answer
        }

        return view('users.teacher.tiffollowup.index', compact(['followupQuestion', 'questions', 'lastQuestion', 'number']));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = auth()->user(); // user who logged in
        $role = $user->roles->first()->name;
        $question = Question::findOrFail($request->get('question_id')); // Get the question data
        $followupQuestion = FollowupQuestion::findOrFail($id); // Get the question data

        $hasAnswer = QuestionAnswer::where([
            'user_id' => $user->id, 
            'question_id' => $question->id,
            'is_tif' => true
        ])->first(); // find the if user has answer

        $hasFollowupAnswer = QuestionAnswer::where([
            'user_id' => $user->id, 
            'question_id' => $question->id, 
            'followup_id' => $id,
            'is_tif' => true
        ])->first(); // find the if user has follow upanswer

        if($hasFollowupAnswer)
        {
            foreach ($question->followupQuestion as $followup) {
                $hasFollowupAnswer = QuestionAnswer::where([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'followup_id' => $followup->id
                ])->first(); // find the if user has followup answer

                if ($hasFollowupAnswer) {
                    return redirect()->route('teacher.tif.followup', $followup->url);
                }
            }
        }

        $points = 0;
        $validation = '';

        if ($followupQuestion->code_id == '1') {

            if ($request->get('answer') == true) {
                $choice = $followupQuestion->questionChoices->where('label', 'Yes')->first();
                $points = $choice->points;
            }else {
                $choice = $followupQuestion->questionChoices->where('label', 'No')->first();
                $points = $choice->points;
            }

        } elseif ($followupQuestion->code_id == '2'){
            $validation = 'required';
            $points = $request->get('answer');

        } elseif ($followupQuestion->code_id == '3'){

            $validation = 'required|string';
            $choice = $followupQuestion->questionChoices->first();
            $points = $choice->points;

        } elseif ($followupQuestion->code_id == '4'){
            $validation = 'required|integer';
            $points = $request->get('answer');

        } elseif ($question->code_id == '5'){
            $points = 0;
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

        // Create Answer for user
        $answer = new QuestionAnswer([
            'user_id' => $request->user()->id,
            'question_id' => $question->id,
            'is_yes' => 1,
            'answer' => $request->get('answer'),
            'points' => $points,
            'followup_id' => $request->get('followup_id'),
            'is_tif' => true
        ]);

        $answer->save(); // Answer Saved

        AnswerScore::where('user_id', $request->user()->id)->update([
            'score_id' => $answer->id
        ]);

        $nextFollowUpQuestion = $answer->question->followupQuestion;

        if ($nextFollowUpQuestion) {
             foreach ($nextFollowUpQuestion as $followup) {
                $proceedToNextFollowQuestion = QuestionAnswer::where([
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'followup_id' => $followup->id
                ])->first(); // find the if user has followup answer

                if (!$proceedToNextFollowQuestion) {
                    return redirect()->route('teacher.tif.followup', $followup->url);
                }
            }
        }

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', true)
                        ->where('id', '>', $question->id)
                        ->first(); // Last Question

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

            return redirect()->to('/teacher/assessment'); // If no more Questions Redirect to assessment page
        }
        
        return redirect()->route('teacher.tif', $lastQuestion->url)->with(['question']);
    }
}
