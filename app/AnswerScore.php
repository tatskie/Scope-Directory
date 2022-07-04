<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerScore extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'score_id', 'total_points', 'is_agree', 'pif_points', 'is_done_tif', 'is_done_question'
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
     * Relationship to Question Answer
     */
    public function questionAnswer()
	{
	    return $this->belongsTo(QuestionAnswer::class, 'score_id');
	}
}
