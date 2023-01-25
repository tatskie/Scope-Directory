<?php

namespace App\Http\Middleware;

use Closure;
use App\Question;
use App\AnswerScore;
use App\QuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $role = Auth::user()->roles->first()->name;

            if (Auth::user()->hasRole('academia')) {
                if (!Auth::user()->answerScore->is_agree == true) {
                    return redirect()->to('/academic/welcome');
                }
                else {
                    if (is_null(Auth::user()->answerScore->score_id)) {
                        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'asc')
                                    ->first();
                        return redirect()->route('question.show', $question->url);
                    }
                }
                
                if(!Auth::user()->card){

                    $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                
                    if (Auth::user()->answerScore->questionAnswer->question_id != $lastQuestion->id) {

                        $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                            $query->where('roles', '=', $role);
                                        })
                                        ->where('impact_factor', false)
                                        ->where('id', '>', Auth::user()->answerScore->questionAnswer->question_id)
                                        ->first();

                            if(!$nextQuestion) {
                                $answers = QuestionAnswer::where('is_tif', false)->where('user_id', Auth::user()->id)->get(); // get all the answer

                                $points = 0; // set the points to 0

                                foreach ($answers as $answer) {
                                    $points = $answer->points + $points; // set the total points
                                }

                                AnswerScore::where('user_id', Auth::user()->id)->update([
                                    'total_points' => $points
                                ]);

                                return redirect()->to('/assessment'); // If no more Questions Redirect to License Card
                            }

                        return redirect()->route('question.show', $nextQuestion->url);

                    }
                    return redirect()->to('/license-card');
                }

                return redirect()->to('academia/dashboard');
            } // user role academia

            // Teacher Role
            if (Auth::user()->hasRole('teacher')) {
                if (!Auth::user()->answerScore->is_agree == true) {
                    return redirect()->to('/teacher/welcome');
                }
                else {
                    if (is_null(Auth::user()->answerScore->score_id)) {
                        $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'asc')
                                    ->first();
                        return redirect()->route('teacher.question', $question->url);
                    }
                }
                
                if(!Auth::user()->card){

                    $lastQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                        $query->where('roles', '=', $role);
                                    })
                                    ->where('impact_factor', false)
                                    ->orderBy('id', 'desc')
                                    ->first();
                                
                    if (Auth::user()->answerScore->questionAnswer->question_id != $lastQuestion->id) {

                        $nextQuestion = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                            $query->where('roles', '=', $role);
                                        })
                                        ->where('impact_factor', false)
                                        ->where('id', '>', Auth::user()->answerScore->questionAnswer->question_id)
                                        ->first();

                            if(!$nextQuestion) {
                                $answers = QuestionAnswer::where('is_tif', false)->where('user_id', Auth::user()->id)->get(); // get all the answer

                                $points = 0; // set the points to 0

                                foreach ($answers as $answer) {
                                    $points = $answer->points + $points; // set the total points
                                }

                                AnswerScore::where('user_id', Auth::user()->id)->update([
                                    'total_points' => $points
                                ]);

                                return redirect()->to('/teacher/assessment'); // If no more Questions Redirect to License Card
                            }

                        return redirect()->route('teacher.question', $nextQuestion->url);

                    }
                    return redirect()->to('/license-card');
                }

                return redirect()->to('teacher/dashboard');
            } // user role teacher

            if (Auth::user()->hasRole('admin')) {
                return redirect()->to('admin/dashboard');
            }

            if (Auth::user()->hasRole('corporate')) {
                return redirect()->to('corporate/dashboard');
            }
        }

        return $next($request);
    }
}
