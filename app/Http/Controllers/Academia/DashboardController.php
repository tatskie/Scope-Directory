<?php

namespace App\Http\Controllers\Academia;

use App\Page;
use App\Question;
use App\AnswerScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        if (!$user->answerScore->is_agree == true) {
            return redirect()->to('/academia-welcome');
        }
        else {
            if (is_null($user->answerScore->score_id)) {
                $question = Question::where('is_tif', false)->orderBy('id', 'asc')->first();
                return redirect()->route('question.show', $question->slug);
            }
        }

        if(!$user->card){
            return redirect()->to('/license-card');
        }
        return view('academia.dashboard');
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
        
        return view('academia.welcome-user', compact(['pages', 'total']));
    }

    /**
     * Proceed to Academia Question
     *
     */
    public function proceedQuestion(Request $request) {
        
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

        return redirect()->route('academia.question', $question->url);
    }
}
