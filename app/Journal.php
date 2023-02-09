<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_of_application', 'journal_name', 'issn', 'year_started', 'journal_website', 'publisher', 'first_name', 'last_name', 'title', 'email', 'current_affiliation', 'country', 'field_of_specialization', 'user_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['year_started'];

    /**
     * belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
