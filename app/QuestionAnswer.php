<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'user_id', 'followup_id', 'answer', 'is_yes', 'points', 'is_tif'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationship to User
     */
    public function user()
	{
	    return $this->belongsTo(User::class);
	}

	/**
     * Relationship to User
     */
    public function question()
	{
	    return $this->belongsTo(Question::class);
	}

    /**
     * Relationship to FollowupQuestion with foreign key of 'followup_id'
     */
    public function followupQuestion()
    {
        return $this->belongsTo(FollowupQuestion::class, 'followup_id');
    }

     /**
     * Relationship to Answer Score
     */
    public function score()
    {
        return $this->hasOne(AnswerScore::class, 'score_id');
    }

}
