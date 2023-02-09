<?php

namespace App;

// use Laravel\Paddle\Billable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomVerificationEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'number', 'two_factor_code', 'two_factor_expires_at'
    ];

    /**
     *
     * @var array
     */
    protected $dates = ['trial_ends_at', 'two_factor_expires_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship Has One to License Card
     */
    public function card()
    {
        return $this->hasOne(LicenseCard::class);
    }

    /**
     * Relationship Has one to Academic Information
     */
    public function academicInformation()
    {
      return $this->hasOne(AcademicInformation::class);
    }

    /**
     * Relationship Has one to Academic Publication
     */
    public function academicPublications()
    {
      return $this->hasMany(AcademicPublication::class);
    }

    /**
     * Relationship Has one to Conference
     */
    public function conferences()
    {
      return $this->hasMany(Conference::class);
    }

    /**
     * Relationship Has Many socialite account
     */
    public function socialites()
    {
        return $this->hasMany(SocialFacebookAccount::class);
    }

    /**
     * Relationship Has Many to Question Answer
     */
    public function questionAnswer()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    /**
     * Relationship Has Many to Sub Question
     */
    public function subQuestion()
    {
        return $this->hasOne(SubQuestion::class);
    }

    /**
     * Relationship Has one to Verify User
     */
    public function verifyUser()
    {
      return $this->hasOne(VerifyUser::class);
    }

    /**
     * Relationship Has one to Verify User
     */
    public function answerScore()
    {
      return $this->hasOne(AnswerScore::class);
    }

    /**
     * Relationship Has many to receipt
     */
    public function receipts()
    {
      return $this->hasMany(Receipt::class);
    }

    /**
     * Relationship Has one to scope id
     */
    public function scope()
    {
      return $this->hasOne(ScopeID::class);
    }

    /**
     * Relationship Has many to videos
     */
    public function videos()
    {
      return $this->hasMany(Video::class);
    }

    /**
     * Relationship Has many to awards
     */
    public function awards()
    {
      return $this->hasMany(Award::class);
    }

    /**
     * Relationship Has many to journals
     */
    public function journals()
    {
      return $this->hasMany(Journal::class);
    }

    /**
     * Relationship Has many to shipping
     */
    public function shippingAddress()
    {
      return $this->hasMany(Shipping::class);
    }

    /**
     * Generate for two factor code.
     */
    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(30);
        $this->save();
    }

    /**
     * Reset two factor code.
     */
    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerificationEmail);
    }
}