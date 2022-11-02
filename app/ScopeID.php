<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeID extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'scope_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scope', 'user_id', 'is_published'
    ];

    /**
     * Relationship Has many to receipt
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
