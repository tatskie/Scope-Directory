<?php

namespace App\Http\Controllers\API\Admin;

use App\Question;
use App\QuestionChoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ChoiceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:admin', 'verified', 'twofactor']);
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
            'label' => 'required|string',
            'points' => 'required|integer',
        ]);

        $choice = new QuestionChoice([
            'label' => $request->get('label'),
            'points' => $request->get('points'),
            'question_id' => $request->get('question_id'),
        ]);

        $choice->save();

        return ['message' => 'Choice Add Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $choice = QuestionChoice::findOrFail($id);

        return Response::json($choice);
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
        $choice = QuestionChoice::findOrFail($id);

        $request->validate([
            'label' => 'required|string',
            'points' => 'required|integer',
        ]);

        $choice->label = $request->get('label');
        $choice->points = $request->get('points');

        $choice->save();

        return ['message' => 'Choice Add Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choice = QuestionChoice::findOrFail($id);
        $question = Question::findOrFail($choice->question_id);

        if (count($question->questionChoices) == 1) {
            return [
                'status' => 'Failed!!!',
                'message' => 'Question must have atleast one choices!',
                'code' => 'warning',
            ];
        }

        $choice->destroy($choice->id);
        
        return [
            'status' => 'Deleted!!!',
            'message' => 'Choice Deleted!',
            'code' => 'success',
        ];
    }
}
