<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenseCard extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gender', 'photo', 'title', 'citizenship', 'category_id', 'tif_id', 'aif_id', 'academia_id', 'academic_title'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationship to User
     */
    public function user()
	{
	    return $this->belongsTo(User::class);
	}

    /**
     * Relationship to license category
     */
    public function licenseCategory()
    {
        return $this->belongsTo(LicenseCategory::class, 'category_id');
    }

    /**
     * Relationship to Academia category
     */
    public function academiaCategory()
    {
        return $this->belongsTo(AcademiaCategory::class, 'academia_id');
    }

    /**
     * Relationship to TIF
     */
    public function tif()
    {
        return $this->belongsTo(TIF::class, 'tif_id');
    }

    /**
     * Relationship to AIF
     */
    public function aif()
    {
        return $this->belongsTo(AIF::class, 'aif_id');
    }
}
