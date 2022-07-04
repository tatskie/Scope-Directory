<?php

namespace App\Http\Controllers\Academia;

use App\Page;
use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class QuestionAnswerController extends Controller
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
     * Reset The question answers of user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resetAnswer(Request $request)
    {
        $request->validate([
            'reset_answer'=> 'required',
        ]); // validate the answer input

        $user = auth()->user(); // Logged in user
        $questionAnswer = $user->questionAnswer; // question answer
        $answerScore = $user->answerScore; // user score

        if ($request->get('reset_answer') != true) {
            return redirect()->back();
        }

        $answerScore->score_id = null; // set to null
        $answerScore->total_points = 0; // set to zero

        $answerScore->save(); // reset score

        foreach ($questionAnswer as $answer) {
            $answer->delete();
        }

        $question = Question::all()->first();
        return redirect()->route('academia.question', $question->url);
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

        return redirect()->to('/academia-license-card'); // redirect license form
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function followupQuestion(Request $request, $id)
    {
        $user = auth()->user(); // user who logged in

        $role = $user->roles->first()->name;

        $pages = Page::all(); // List of Pages
        $question = Question::findOrFail($request->get('question_id')); // Get the question data
        $followupQuestion = FollowupQuestion::findOrFail($id); // Get the question data

        $hasAnswer = QuestionAnswer::where([
            'user_id' => $user->id, 
            'question_id' => $question->id
        ])->first(); // find the if user has answer

        $hasFollowupAnswer = QuestionAnswer::where([
            'user_id' => $user->id, 
            'question_id' => $question->id, 
            'followup_id' => $id
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
                    return redirect()->route('academia.followup', $followup->url);
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
                    return redirect()->route('academia.followup', $followup->url);
                }
            }
        }

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->where('id', '>', $question->id)
                        ->first(); // Last Question

        if(!$lastQuestion)
        {

            $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

            $points = 0; // set the points to 0

            foreach ($answers as $answer) {
                $points = $answer->points + $points; // set the total points
            }

            AnswerScore::where('user_id', $request->user()->id)->update([
                'total_points' => $points
            ]);

            return redirect()->to('/academia-assessment'); // If no more Questions Redirect to assessment page
        }
        
        return redirect()->route('academia.question', $lastQuestion->url)->with(['question', 'pages']);
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
        $pages = Page::all(); // List of Pages
        $question = Question::findOrFail($request->get('question_id')); // Get the question data
        $hasAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $question->id])->first(); // find the if user has answer

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
            $lastAnswer = QuestionAnswer::where('is_tif', false)->orderBy('id', 'desc')->first();
            $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                $query->where('roles', '=', $role);
                            })
                            ->where('impact_factor', false)
                            ->where('id', '>', $lastAnswer->question->id)
                            ->first();

            return redirect()->route('academia.questions', $nextQuestion->url); // return if user has answer
        }

        // Create Answer for user
        $answer = new QuestionAnswer([
            'user_id' => $request->user()->id,
            'question_id' => $question->id,
            'is_yes' => $value,
            'points' => $points,
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
                        return redirect()->route('academia.followup', $followup->url);
                    }
                }
            }
        }
        

        $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->where('id', '>', $question->id)
                        ->first();

        if(!$lastQuestion)
        {
            $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

            $points = 0; // set the points to 0

            foreach ($answers as $answer) {
                $points = $answer->points + $points; // set the total points
            }

            AnswerScore::where('user_id', $request->user()->id)->update([
                'total_points' => $points
            ]);

            return redirect()->to('/academia-assessment'); // If no more Questions Redirect to License Card
        }

        return redirect()->route('academia.question', $lastQuestion->url)->with(['question', 'pages']);

    
    }
}
