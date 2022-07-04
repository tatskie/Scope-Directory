<?php

namespace App\Http\Controllers;

use PDF;
use App\Page;
use App\Question;
use App\LicenseCard;
use App\QuestionAnswer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'twofactor']);
    }
	 /**
     * Show the Edit form for profile.
     *
     */
    public function index()
    {
        $pages = Page::all(); // list of pages
        $user = auth()->user(); // Logged in user
        $card = $user->card;
        
        return view('profile.edit-profile', compact(['pages', 'card', 'user'])); // return to home
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
        	'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
        ]);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->save();

        return redirect()->to('home');
    }

    /**
     * Export To PDF.
     *
     */
    public function pdfExport()
    {
        $user = auth()->user(); // Logged in user
        $card = $user->card; // card details

        $pdf = PDF::loadView('profile.pdf', ['card' => $card, 'user' => $user])->setPaper('a4', 'portrait');
        $pdf->output(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setOption('javascript-delay', 3000);
        
        $fileName = $user->name;

        return $pdf->stream($fileName . '.pdf');
    }

    /**
     * Show the Edit Email.
     *
     */
    public function editEmail()
    {
        $pages = Page::all(); // list of pages

        return view('profile.email', compact(['pages']));
    }

    public function updateEmail(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->email = $request->get('email');

        $user->save();

        return redirect()->to('email/verify');
    }
}
