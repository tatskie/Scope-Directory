<?php

namespace App\Http\Controllers;

use App\Question;
use Carbon\Carbon;
use App\VerifyUser;
use App\QuestionAnswer;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Verify User when created in admin dashboard or corporate dashboard
     *
     * @param $token
     */
    public function verifyUser($token)
    {
      $verifyUser = VerifyUser::where('token', $token)->first(); // get the verify user

      if(isset($verifyUser) ){
        $user = $verifyUser->user;
        if(!$user->email_verified_at) {
          $verifyUser->user->email_verified_at = Carbon::now();
          $verifyUser->user->save();
          $status = "Your e-mail is verified. You can now login.";
        } else {
          $status = "Your e-mail is already verified. You can now login.";
        }
      } else {
        return redirect('/login')->with('warning', "Sorry your email cannot be identified."); 
      }
      return redirect()->route('reset', $token)->with('status', $status); // redirect to Change Password
    }

    /**
     * Return view to change password
     *
     * @param $token
     */
    public function reset($token){

    	$verifyUser = VerifyUser::where('token', $token)->first(); // get the verify user

    	if(isset($verifyUser) ){
	        $user = $verifyUser->user;
	    }

    	return view('emails.reset', compact('user'));
    }

    /**
     * Return view to change password
     *
     * @param $token
     */
    public function resetPassword(Request $request, $token){

    	$verifyUser = VerifyUser::where('token', $token)->first(); // get the verify user

	    if(isset($verifyUser) ){
	        $user = $verifyUser->user;


			$user->password = Hash::make($request->get('passowrd'));
			$user->save();
	        

	      } else {
	        return redirect('/login')->with('warning', "Sorry your email cannot be identified."); 
	      }

	    // User is corporate return to corporate dashboard
        if($user->hasRole('corporate')) {
            return redirect()->intended('/corporate/dashboard');
        }

        // User is academia return to academia dashboard
        if($user->hasRole('academia')) {
            return redirect()->intended('/academia/dashboard');
        }

        if($user->questionAnswer->isEmpty()) {

            $firstQuestion = Question::orderBy('number', 'asc')->first();

            return redirect()->route('question.show', $firstQuestion->id);
        }

        $lastQuestionAnswer = QuestionAnswer::where('user_id', $user->id)->orderBy('id', 'desc')->first(); // Last Question who answered for user
        $lastQuestion = Question::orderBy('number', 'desc')->first(); // find the Last Question

        if($lastQuestionAnswer->question->number != $lastQuestion->number) // determine if not the last question
        {
            return redirect()->route('question.show', $lastQuestionAnswer->question->number + 1); // redirect to next question
        }
        
        // User application for license card
        if(is_null($user->card)) {
            return redirect()->to('/license-card');
        }

        // User redirect Home
        return redirect()->intended('/home'); 
    }
}
