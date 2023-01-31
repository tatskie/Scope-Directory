<?php

namespace app\Http\Controllers\API\Teacher;

use App\Question;
use App\QuestionAnswer;
use App\LicenseCategory;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:teacher', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionAnswer::where('user_id', auth()->user()->id)->where('is_tif', false)->with('question')->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $answer = QuestionAnswer::where('question_id', $id)->where('user_id', $user->id)->first();
        $followupQuestion = FollowupQuestion::where('question_id', $id)->first();
        $followupAnswer = [];

        if ($followupQuestion) {
            $followupAnswer = QuestionAnswer::where('question_id', $id)->where('user_id', $user->id)->where('followup_id', $followupQuestion->id)->first();
        }
        
        return ['followupQuestion' => $followupQuestion, 'answer' => $answer, 'followupAnswer' => $followupAnswer];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id); // find the Specified question by ID

        $user = auth()->user(); // User who loggedin

        $request->validate([
            'is_yes'=>'required',
        ]); // validate 

        $answer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $question->id])->first(); // get the specific answer

        $points = 0; // set the points

        if ($request->get('is_yes') == true) { // get the value of points
            $points = $question->points;
        }

        if ($answer) { // if already has a answer
            if (!$request->get('is_yes') == true) {
                if($question->followupQuestion) { // if has a followup question
                    $followup = $question->followupQuestion->first(); // get the followup id

                    if($followup) {
                        $followupAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $question->id, 'followup_id' => $followup->id])->first(); // get the followup answer

                        if ($followupAnswer) {
                            $followupAnswer->answer = '';
                            $followupAnswer->points = 0;
                            $followupAnswer->is_yes = $request->get('is_yes');

                            $followupAnswer->save(); // update the folowup answer
                        }else {
                            $data = new QuestionAnswer([
                                'user_id' => $user->id,
                                'question_id' => $question->id,
                                'followup_id' => $followup->id,
                                'points' => 0,
                                'is_yes' => $request->get('is_yes'),
                                'answer' => null,
                            ]);

                            $data->save();
                        } 
                    }
                    
                }
            }else {
                $followup = $question->followupQuestion->first(); // get the followup id

                if($followup) { // if has a followup question
                    $request->validate([
                        'answer'=>'required',
                    ]); // validate the answer is required

                    $followupPoints = 0;

                    if ($followup->input == 'year') {
                        $followupPoints = $request->get('answer'); // set the points
                    }

                    if ($followup->input == 'string') {
                        $followupPoints = $followup->points; // set the points tentative
                    }

                    $followupAnswer = QuestionAnswer::where(['user_id' => $user->id, 'question_id' => $question->id, 'followup_id' => $followup->id])->first(); // get the followup answer
                    
                    if($followupAnswer) {
                        $followupAnswer->answer = $request->get('answer');
                        $followupAnswer->points = $followupPoints;
                        $followupAnswer->is_yes = $request->get('is_yes');

                        $followupAnswer->save(); // update the folowup answer
                    }else {
                        $data = new QuestionAnswer([
                            'user_id' => $user->id,
                            'question_id' => $question->id,
                            'followup_id' => $followup->id,
                            'points' => $followupPoints,
                            'is_yes' => $request->get('is_yes'),
                            'answer' => $request->get('answer'),
                        ]);

                        $data->save();
                    } 
                }
            }
            

            $answer->is_yes = $request->get('is_yes');
            $answer->points = $points;
            $answer->save(); // update the answer

            $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

            $points = 0; // set the points to 0

            foreach ($answers as $ans) {
                $points = $ans->points + $points; // set the total points
            }

            $categories = LicenseCategory::all(); // get all the license categories

            foreach ($categories as $category) {
                if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
                    $data = $category; // set the data
                } // find the category by points.
            }

            $card = auth()->user()->card;

            $card->category_id = $data->id;

            $card->save();

            return ['message' => 'Update Answer Successfully!'];
        } 


        if (!$request->get('is_yes') == true) { // if answer is NO
            $answer = new QuestionAnswer([ // create new question answer
                'user_id' => $user->id,
                'question_id' => $question->id,
                'points' => $points,
                'is_yes' => $request->get('is_yes'),
            ]);

            $answer->save();

            $followup = $question->followupQuestion->first(); // get the followup id

            if($followup) {
                $followupAnswer = new QuestionAnswer([ // create new followup question answer
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'followup_id' => $followup->id,
                    'points' => 0,
                    'is_yes' => $request->get('is_yes'),
                    'answer' => null,
                ]);

                $followupAnswer->save();
            }
        } else { // if anser is YES
            $followup = $question->followupQuestion->first(); // get the followup id

            if($followup) {
                $request->validate([
                    'answer'=>'required',
                ]); // validate the answer is required

                $followupPoints = 0;

                if ($followup->input == 'year') {
                    $followupPoints = $request->get('answer'); // set the points
                }

                if ($followup->input == 'string') {
                    $followupPoints = $followup->points; // set the points tentative
                }

                $followupAnswer = new QuestionAnswer([ // create new followup question answer
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                    'followup_id' => $followup->id,
                    'points' => $followupPoints,
                    'is_yes' => $request->get('is_yes'),
                    'answer' => $request->get('answer'),
                ]);

                $followupAnswer->save();
            }
            
            $answer = new QuestionAnswer([ // create new question answer
                'user_id' => $user->id,
                'question_id' => $question->id,
                'points' => $points,
                'is_yes' => $request->get('is_yes'),
            ]);

            $answer->save();
        }
        

        $answers = QuestionAnswer::where('user_id', auth()->user()->id)->get(); // get all the answer

        $points = 0; // set the points to 0

        foreach ($answers as $ans) {
            $points = $ans->points + $points; // set the total points
        }

        $categories = LicenseCategory::all(); // get all the license categories

        foreach ($categories as $category) {
            if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
                $data = $category; // set the data
            } // find the category by points.
        }

        $card = auth()->user()->card;

        $card->category_id = $data->id;

        $card->save();

        return ['message' => 'Update Answer Successfully!'];

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backCardData()
    {
        $answers = QuestionAnswer::where('user_id', auth()->user()->id)->where('is_tif', false)->with(['question', 'followupQuestion'])->get();

        $data = collect([]);

        foreach ($answers as $key => $answer) {

            if ($answer->question_id == 2) {
                $data->put('affiliation', $answer->answer);
            }

            if ($answer->question_id == 5 && $answer->followup_id == 3) {
                $data->put('board', $answer->answer);
            }

            if ($answer->question_id == 11 && $answer->followup_id == 4) {
                $data->put('tesol', $answer->answer);
            }
        }

        return $data;
    }
}
