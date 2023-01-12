<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPublication extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'academic_publications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'title', 'journal', 'doi', 'source', 'user_id'
    ];

    /**
     * belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
