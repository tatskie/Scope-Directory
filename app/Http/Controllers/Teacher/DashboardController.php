<?php

namespace App\Http\Controllers\Teacher;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('teacher.dashboard');
    }
}
