<?php

namespace App\Http\Controllers\Users\Editor;

use App\Country;
use App\Journal;
use App\AnswerScore;
use App\LicenseCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
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
     * Show the application licence card.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$countries = Country::all(); // list of countries

        return view('users.editor.journal.index', compact(['countries']));
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
            'type_of_application'=>'required|string|max:255',
            'journal_name'=>'required|string|max:255',
            'issn'=>'required|string|max:255',
            'year_started'=>'required|date|max:255',
            'journal_website'=>'required|string|max:255',
            'publisher'=>'required|string|max:255',
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'title'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'current_affiliation'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'field_of_specialization'=>'required|string|max:5000',
        ]);

        $journal = new Journal([
            'type_of_application' => $request->get('type_of_application'),
            'journal_name' => $request->get('journal_name'),
            'issn' => $request->get('issn'),
            'year_started' => $request->get('year_started'),
            'journal_website' => $request->get('journal_website'),
            'publisher' => $request->get('publisher'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'current_affiliation' => $request->get('current_affiliation'),
            'country' => $request->get('country'),
            'field_of_specialization' => $request->get('field_of_specialization'),
            'user_id' => auth()->user()->id
        ]);

        $journal->save();

        $score = AnswerScore::where('user_id', auth()->user()->id)->first();

        $score->is_agree = 1;

        $score->save();

        $card = new LicenseCard([
            'gender' => 'NS',   
            'photo' => 'default.jpg',
            'title' => $request->get('type_of_application'),
            'academic_title' => $request->get('type_of_application'),
            'citizenship' => $request->get('country'),
            'user_id' => auth()->user()->id
        ]);

        $card->save();

        return redirect()->to('/editor/dashboard');
    }
}
