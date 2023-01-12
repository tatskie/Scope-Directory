<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'link', 'video', 'user_id'
    ];

    /**
     * Relationship Has many to user
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
