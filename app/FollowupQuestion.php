<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class FollowupQuestion extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'question', 'url', 'code_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
     /**
     * If user pages retrieve the model by the $url instead of the default $id
     * If admin pages retrieve the model by $id
     */
    public function getRouteKeyName()
    {
         return Request::segment(1) === 'admin' ? 'id' : 'url';
    }

    /**
     * Relationship Belongs to Question to Question
     */
    public function mainQuestion()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * Relationship Has Many to Followup Question
     */
    public function followupAnswer()
    {
        return $this->hasMany(QuestionAnswer::class, 'followup_id');
    }

    /**
     * Relationship Has Many to Question Choices
     */
    public function questionChoices()
    {
        return $this->hasMany(QuestionChoice::class, 'followup_id');
    }

    /**
     * Relationship Belongs to Choice code
     */
    public function code()
    {
        return $this->belongsTo(ChoiceCode::class, 'code_id');
    }
}
