<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerWork extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'volunteer_works';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'volunteer_work'
    ];

    /**
     * belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
