<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'url', 'impact_factor', 'code_id'
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
     * Relationship Has Many to Question Answer
     */
    public function questionAnswer()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    /**
     * Relationship Has Many to Filter Question
     */
    public function followupQuestion()
    {
        return $this->hasMany(FollowupQuestion::class, 'question_id');
    }

    /**
     * Relationship Has Many to Filter Question
     */
    public function filterQuestion()
    {
        return $this->hasMany(FilterQuestion::class, 'question_id');
    }

    /**
     * Relationship Has Many to Question Choices
     */
    public function questionChoices()
    {
        return $this->hasMany(QuestionChoice::class, 'question_id');
    }

    /**
     * Relationship Belongs to Choice code
     */
    public function code()
    {
        return $this->belongsTo(ChoiceCode::class, 'code_id');
    }
}
