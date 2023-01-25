<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        if (!$user->answerScore->is_agree == true) {
            return redirect()->to('/teacher/welcome');
        }
        else {
            if (is_null($user->answerScore->score_id)) {
                $question = Question::where('is_tif', false)->orderBy('id', 'asc')->first();
                return redirect()->route('teacher.question', $question->slug);
            }
        }

        if(!$user->card){
            return redirect()->to('/license-card');
        }
        return view('users.teacher.dashboard');
    }
}
