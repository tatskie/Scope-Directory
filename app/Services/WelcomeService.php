<?php

namespace App\Services;

class WelcomeService
{	
	public function userAgreement($bool, $role) {

        $redirectTo = '/'. $role .'/welcome';
        // dd($redirectTo);
	    return redirect()->intended($redirectTo);
	}
}

