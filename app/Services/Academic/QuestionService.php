<?php

namespace App\Services\Academic;

class QuestionService
{	
	/**
     * redirect to
     *
     * @var string
     */
    protected $redirectTo;

	/**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = '/academia/welcome';
    }

	public function userAgreement($bool) {
		return !$bool ? redirect()->intended('/academia/welcome');
	}
	
}

