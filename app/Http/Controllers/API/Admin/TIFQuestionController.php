<?php

namespace App\Http\Controllers\API\Admin;

use App\Question;
use App\FilterQuestion;
use App\QuestionChoice;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
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
        $this->middleware(['auth:api', 'role:admin', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = 'academia';
        return Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                    $query->where('roles', '=', $role);
                })
                ->where('impact_factor', true)
                ->orderBy('id', 'asc')
                ->with(['filterQuestion', 'followupQuestion'])
                ->paginate(100);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lastQuestion()
    {
        $role = 'academia';

        return Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                    $query->where('roles', '=', $role);
                })
                ->where('is_tif', true)
                ->orderBy('id', 'asc')
                ->first();
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
            'question'=>'required',
            'code_id'=>'required',
        ]);

        $question = new Question([
            'question' => $request->get('question'),
            'url' => uniqid(),
            'impact_factor' => $request->get('impact_factor'),
            'code_id' => $request->get('code_id'),
        ]);

        $question->save();

        if ($question->code_id == 1) {

            $yes = new QuestionChoice([
                'points' => '0',
                'question_id' => $question->id,
                'label' => 'Yes',
            ]);

            $yes->save();

             $no = new QuestionChoice([
                'points' => '0',
                'question_id' => $question->id,
                'label' => 'No',
            ]);

            $no->save();
        }

        if ($question->code_id == 3) {

            $yes = new QuestionChoice([
                'points' => '0',
                'question_id' => $question->id,
                'label' => '',
            ]);

            $yes->save();
        }

        $role = new FilterQuestion([
            'roles' => 'academia',
            'is_yes' => true,
            'question_id' => $question->id
        ]);

        $role->save();

        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return Response::json($question);
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
        $question = Question::findOrFail($id);
        
        $request->validate([
            'question'=>'required',
            'points'=>'required|integer'
        ]);

        $question->question = $request->get('question');
        $question->points = $request->get('points');
        $question->save();

        

        if ($request->get('followup')) {
            $followupQuestion = $question->followupQuestion->first();
            $data = $request->get('followup');
            if (!$followupQuestion) {
                FollowupQuestion::create([
                    'question_id' => $question->id,
                    'question' => $data['question'],
                    'type' => $data['type'],
                    'input' => $data['input'],
                    'points' => $data['points'],
                    'is_yes' => 1,
                ]);
            }

            $followupQuestion->input = $data['input'];
            $followupQuestion->type = $data['type'];
            $followupQuestion->question = $data['question'];
            $followupQuestion->points = $data['points'];

            $followupQuestion->save();            
        }
        
        return ['message' => 'Question Edited Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->destroy($question->id);
        
        return ['message' => 'Question Deleted!'];
    }
}
