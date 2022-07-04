<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;  
use Illuminate\Database\Eloquent\Builder;

class AccountType extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$pages = Page::all();
    	return view('roles', compact('pages'));
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
            'account_type'=>'required',
        ]);

        if ($request->get('account_type') == 'admin') {
        	return redirect()->back()->with('error', 'Please specify your account type');
        }

        if ($request->get('account_type') == 'corporate') {
        	return redirect()->back()->with('error', 'Please specify your account type');
        }

        $roles = Role::all();
        $user = auth()->user();
        $data = '';

        foreach ($roles as $role) {
        	if ($request->get('account_type') == $role->name) {
        		$data = $role;
        	}
        }

        if (!$data) {
        	return redirect()->back()->with('error', 'Please specify your account type');
        }

        $user->assignRole($data);

        $role = $user->roles->first()->name;
        
       if (auth()->user()->hasRole('teacher')) {

            if (!$user->answerScore->is_agree == true) {
                return redirect()->intended('/teacher-welcome');
            }
            else {
                if (is_null($user->answerScore->score_id)) {
                    $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                    $query->where('roles', '=', $role);
                                })
                                ->where('is_tif', false)
                                ->orderBy('id', 'asc')
                                ->first();
                    return redirect()->route('question.show', $question->url);
                }
            }

            if(!$user->card){
                return redirect()->to('/license-card');
            }
            return redirect()->intended('/teacher/dashboard');
        }

        if (auth()->user()->hasRole('academia')) {

            if (!$user->answerScore->is_agree == true) {
                return redirect()->intended('/academia-welcome');
            }

            else {
                if (is_null($user->answerScore->score_id)) {
                    $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                    $query->where('roles', '=', $role);
                                })
                                ->where('is_tif', false)
                                ->orderBy('id', 'asc')
                                ->first();
                    return redirect()->route('academia.question', $question->url);
                }
            }

            if(!$user->card){
                return redirect()->to('/academia-license-card');
            }
            
            return redirect()->intended('/academia/dashboard');
        }

        if (auth()->user()->hasRole('undergrad')) {

            if (!$user->answerScore->is_agree == true) {
                return redirect()->intended('/undergrad-welcome');
            }

            else {
                if (is_null($user->answerScore->score_id)) {
                    $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                    $query->where('roles', '=', $role);
                                })
                                ->where('is_tif', false)
                                ->orderBy('id', 'asc')
                                ->first();
                    return redirect()->route('undergrad.question', $question->url);
                }
            }

            if(!$user->card){
                return redirect()->to('/undergrad-license-card');
            }
            
            return redirect()->intended('/undergrad/dashboard');
        }

        return redirect()->back()->with('error', 'Whoops! Something went wrong!');
    }
}
