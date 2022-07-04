<?php

namespace App\Http\Controllers\Teacher;

use App\AIF;
use App\Page;
use App\Question;
use App\AnswerScore;
use App\AcademiaCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function welcomeUser() {

        $user = auth()->user();

        $role = $user->roles->first()->name;
        $aifs = AIF::all();
        $categories = AcademiaCategory::all();

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

        $total = count($questions);
        $pages = Page::all();
        
        return view('teacher.welcome-user', compact(['pages', 'total', 'aifs', 'categories']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function updateScore(Request $request) {

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

        return redirect()->route('question.show', $question->url);
    }
}
