<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'name', 'location', 'link', 'user_id'
    ];

    /**
     * belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
