<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChoiceCode extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_of_choices'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Relationship Has many to Questions
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'code_id');
    }

     /**
     * Relationship Has many to Followup Questions
     */
    public function FollowupQuestion()
    {
        return $this->hasMany(FollowupQuestion::class, 'code_id');
    }
}
