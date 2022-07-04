<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['user_id', 'provider_user_id', 'provider'];

	public function user()
	{
	    return $this->belongsTo(User::class);
	}
}
