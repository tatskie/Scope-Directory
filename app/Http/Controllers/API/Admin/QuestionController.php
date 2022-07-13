<?php

namespace App\Http\Controllers\API\Admin;

use App\Question;
use App\ChoiceCode;
use App\FilterQuestion;
use App\QuestionChoice;
use App\FollowupQuestion;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
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
                ->where('impact_factor', false)->orderBy('id', 'asc')
                ->with(['filterQuestion', 'followupQuestion'])
                ->paginate(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teacher()
    {
        $role = 'teacher';
        return Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                    $query->where('roles', '=', $role);
                })
                ->where('impact_factor', false)->orderBy('id', 'asc')
                ->with(['filterQuestion', 'followupQuestion'])
                ->paginate(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function academia()
    {
        $role = 'academia';
        return Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                    $query->where('roles', '=', $role);
                })
                ->where('impact_factor', false)->orderBy('id', 'asc')
                ->with(['filterQuestion', 'followupQuestion'])
                ->paginate(200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function undergrad()
    {
        $role = 'undergrad';
        return Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                    $query->where('roles', '=', $role);
                })
                ->where('impact_factor', false)->orderBy('id', 'asc')
                ->with(['filterQuestion', 'followupQuestion'])
                ->paginate(200);
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
                ->where('impact_factor', false)
                ->orderBy('id', 'asc')
                ->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        $roles = Role::all();

        return Response::json($roles);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choices()
    {
        $choices = ChoiceCode::all();

        return Response::json($choices);
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

        return Response::json($question->load(['followupQuestion.code', 'questionChoices', 'filterQuestion', 'code']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function currentNumber($id)
    {
        $question = Question::findOrFail($id);
        $number = 0;

        if (count($question->filterQuestion)) {
            $role = $question->filterQuestion->first();
            $name = $role->roles;

            $number = Question::whereHas('filterQuestion', function (Builder $query) use($name) {
                            $query->where('roles', '=', $name);
                      })->where('impact_factor', $question->impact_factor)->where('id','<', $question->id)->count() + 1;
        }        
        
        return $number;
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
        ]);

        $question->question = $request->get('question');
        $question->save();
        
        return ['message' => 'Question Updated Successfully!'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function questionType(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        
        $request->validate([
            'code_id'=>'required',
        ]);

        $question->code_id = $request->get('code_id');
        $question->save();
        
        return ['message' => 'Question Type Updated Successfully!'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function impactFactor(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        
        $request->validate([
            'impact_factor'=>'required',
        ]);

        $question->impact_factor = $request->get('impact_factor');
        $question->save();
        
        return ['message' => 'Impact Factor Updated Successfully!'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roleQuestion(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        
        $request->validate([
            'account_type'=>'required',
        ]);

        if (count($question->filterQuestion)) {

           $role = $question->filterQuestion->first();

           $role->roles = $request->get('account_type');

           $role->save();

        } else {
            $role = new FilterQuestion([
                'roles' => $request->get('account_type'),
                'is_yes' => true,
                'question_id' => $question->id
            ]);

            $role->save();
        }

        return ['message' => 'Account Type Updated Successfully!'];
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
