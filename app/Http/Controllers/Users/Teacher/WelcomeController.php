<?php

namespace App\Http\Controllers\Users\Teacher;

use App\TIF;
use App\Question;
use App\AnswerScore;
use App\LicenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $role = $user->roles->first()->name;	
        $tifs = TIF::orderBy('id', 'desc')->get();
        $categories = LicenseCategory::all();

        if ($user->answerScore->is_agree == true) {

            $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                            $query->where('roles', '=', $role);
                        })
                        ->where('impact_factor', false)
                        ->orderBy('id', 'asc')
                        ->first();

            return redirect()->route('question.show', $question->url);
        }

        $questions = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', false)
                    ->get();

        $pif = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', true)
                    ->get();

        $total = count($questions);
        $totalPif = count($pif);
        
        return view('users.teacher.welcome', compact(['total', 'tifs', 'categories', 'totalPif']));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function score(Request $request) {

        $request->validate([
            'is_agree'=> 'required',
        ]);

        $user = auth()->user();

        $role = $user->roles->first()->name;
        
        $score = AnswerScore::where('user_id', auth()->user()->id)->first();

        $score->is_agree = 1;

        $score->save();

        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                    })
                    ->where('impact_factor', false)
                    ->orderBy('id', 'asc')
                    ->first();

        return redirect()->route('teacher.question', $question->url);
    }
}
