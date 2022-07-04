<?php

namespace App\Http\Controllers\Academia;

use App\TIF;
use App\Page;
use App\LicenseCard;
use App\QuestionAnswer;
use App\LicenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessmentController extends Controller
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
       $pages = Page::all(); // list of pages
        $user = auth()->user(); // Logged in user

        $answerScore = $user->answerScore; // user score

        if($user->questionAnswer->isEmpty())
        {
            return redirect()->to('/academia-welcome');
        }
        
        if ($answerScore->is_done_question == true) {
            return redirect()->to('academia-license-card');
        }
        
        return view('academia.assessment', compact(['pages'])); // return to home
    }
}
