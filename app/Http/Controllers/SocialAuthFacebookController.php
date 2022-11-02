<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Database\Eloquent\Builder;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
   /**
    * Create a redirect method to facebook api.
    *
    * @return void
    */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);

        if (!$user->email) {
            return redirect()->to('/edit-email');
        }

        $role = $user->roles->first()->name;
        
        if (auth()->user()->hasRole('academia')) {

            if (!$user->answerScore->is_agree == true) {
                return redirect()->intended('/academic/welcome');
            }
            else {
                if (is_null($user->answerScore->score_id)) {
                    $question = Question::whereHas('filterQuestion', function (Builder $query) use($role) {
                                    $query->where('roles', '=', $role);
                                })
                                ->where('impact_factor', false)
                                ->orderBy('id', 'asc')
                                ->first();
                                
                    return redirect()->route('question.show', $question->url);
                }
            }

            if(!$user->card){
                return redirect()->to('/license-card');
            }
            return redirect()->intended('/academia/dashboard');
        }
    }
}
