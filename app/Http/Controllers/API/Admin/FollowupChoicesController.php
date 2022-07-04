<?php

namespace App\Http\Controllers\API\Admin;

use App\QuestionChoice;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class FollowupChoicesController extends Controller
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
            'followup_id' => $request->get('followup_id'),
        ]);

        $choice->save();

        return ['message' => 'Followup Choice Add Successfully!'];
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

        return ['message' => 'Followup Choice Add Successfully!'];
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
        $followupQuestion = FollowupQuestion::findOrFail($choice->followup_id);

        if (count($followupQuestion->questionChoices) == 1) {
            return [
                'status' => 'Failed!!!',
                'message' => 'Followup Question must have atleast one choices!',
                'code' => 'warning',
            ];
        }

        $choice->destroy($choice->id);
        
        return [
            'status' => 'Deleted!!!',
            'message' => 'Followup Choice Deleted!',
            'code' => 'success',
        ];
    }
}
