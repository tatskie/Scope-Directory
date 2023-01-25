<?php

namespace App\Http\Controllers\Users\Teacher;

use App\TIF;
use App\Question;
use App\LicenseCard;
use App\QuestionAnswer;
use App\LicenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class AssessmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:teacher', 'verified', 'twofactor']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user(); // Logged in user
        $card = $user->card; // license card
        $answerScore = $user->answerScore; // user score
        $role = $user->roles->first()->name;

        if($user->questionAnswer->isEmpty())
        {
            return redirect()->to('/teacher/welcome');
        }
        
        if ($answerScore->is_done_question == true) {
            return redirect()->to('/teacher/card');
        }

        $answers = QuestionAnswer::where('is_tif', false)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $points = 0; // set the points to 0

        foreach ($answers as $answer) {
            $points = $answer->points + $points; // set the total points
        }

        $categories = LicenseCategory::all(); // get all the license categories

        foreach ($categories as $category) {
            if ($points >= $category->points_minimum && $points <= $category->points_maximum) {
                if ($category->id == 10) {
                    $data = LicenseCategory::findOrFail(9); // set the data
                } else {
                    $data = $category;
                }
                
            } // find the category by points.
        }

        $pifAnswers = QuestionAnswer::where('is_tif', true)->where('user_id', auth()->user()->id)->get(); // get all the answer

        $pifPoints = 0; // set the points to 0
        $dataPif = '';

        $tifs = TIF::all();

        if ($pifAnswers) {
            foreach ($pifAnswers as $pifAnswer) {
                $pifPoints = $pifAnswer->points + $pifPoints; // set the total points
            }

            foreach ($tifs as $tif) {
                if ($pifPoints >= $tif->points_minimum && $pifPoints <= $tif->points_maximum) {
                    $dataPif = $tif;
                }
            }
        }
        
        $tif = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                        $query->where('roles', '=', $role);
                     })
                     ->where('impact_factor', true)
                     ->first();

        return view('users.teacher.license.assessment', compact(['data', 'categories', 'dataPif', 'tifs', 'tif'])); // return to home
    }

    /**
     * Proceed and agree with the license category
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function proceed(Request $request)
    {

        $request->validate([
            'proceed_answer'=> 'required',
        ]); // validate the answer input

        if ($request->get('proceed_answer') != true) {
            return redirect()->back();
        }
        
        $user = auth()->user(); // Logged in user
        $answerScore = $user->answerScore; // user score

        $answerScore->is_done_question = 1; // user is done with the questions

        $answerScore->save(); // reset score

        return redirect()->to('/teacher/license-card'); // redirect license form
    }
}
