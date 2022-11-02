<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicInformation extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'academic_informations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer', 'index', 'is_present', 'from', 'to', 'bio', 'additional_information', 'user_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['from', 'to'];

    /**
     * belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
