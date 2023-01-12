<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'awards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'link', 'user_id'
    ];

    /**
     * Relationship Has many to user
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
