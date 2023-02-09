<?php

namespace App\Http\Controllers\Users\Editor;

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
        $this->middleware(['role:editor', 'verified', 'twofactor']);
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
            return redirect()->to('/editor/journal-form');
        }

        return view('users.editor.dashboard');
    }
}
