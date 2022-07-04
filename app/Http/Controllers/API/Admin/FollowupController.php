<?php

namespace App\Http\Controllers\API\Admin;

use App\QuestionChoice;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class FollowupController extends Controller
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
            'question'=>'required|string',
            'question_type'=>'required|integer'
        ]);

        $followup = new FollowupQuestion([
            'question' => $request->get('question'),
            'question_id' => $request->get('question_id'),
            'url' => uniqid(),
            'code_id' => $request->get('question_type')
        ]);

        $followup->save();

        if ($followup->code_id == 1) {

            $yes = new QuestionChoice([
                'points' => '0',
                'followup_id' => $followup->id,
                'label' => 'Yes'
            ]);

            $yes->save();

             $no = new QuestionChoice([
                'points' => '0',
                'followup_id' => $followup->id,
                'label' => 'No'
            ]);

            $no->save();
        }

        if ($followup->code_id == 3) {

            $yes = new QuestionChoice([
                'points' => '0',
                'followup_id' => $followup->id,
                'label' => ''
            ]);

            $yes->save();
        }

        return [
            'status' => 'Created!!!',
            'message' => 'Followup Question Added Successfully!',
            'code' => 'success',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $followup = FollowupQuestion::findOrFail($id);
        
        return Response::json($followup->load('questionChoices'));
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
        $followup = FollowupQuestion::findOrFail($id);
        
        $request->validate([
            'question'=>'required|string',
            'code_id'=>'required|integer'
        ]);

        $followup->question = $request->get('question');
        $followup->code_id = $request->get('code_id');
        $followup->save();

        return [
            'status' => 'Updated!!!',
            'message' => 'Followup Question Updated Successfully!',
            'code' => 'success',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $followup = FollowupQuestion::findOrFail($id);
        $followup->destroy($followup->id);
            
        return [
            'status' => 'Deleted!!!',
            'message' => 'Followup Question Deleted Successfully!',
            'code' => 'success',
        ];
    }
}
