<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LicenseCategory extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'specialist_title', 'class', 'criteria_notes', 'points_minimum', 'points_maximum', 'fee', 'shipping'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Relationship to license cards
     */
    public function cards()
    {
        return $this->hasMany(LicenseCard::class, 'category_id');
    }

    /**
     * Relationship to Receipt
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'category_id');
    }
}
