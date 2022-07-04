<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionChoice extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'points', 'label', 'question_id', 'followup_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Relationship belongs to to Question
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

     /**
     * Relationship belongs to to Question
     */
    public function FollowupQuestion()
    {
        return $this->belongsTo(FollowupQuestion::class, 'followup_id');
    }
}
