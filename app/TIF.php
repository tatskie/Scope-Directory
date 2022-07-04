<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TIF extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'title', 'points_minimum', 'points_maximum'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationship to License Card
     */
    public function licenseCard()
    {
        return $this->belongsTo(LicenseCard::class, 'tif_id');
    }

    /**
     * Relationship to Receipt
     */
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'tif_id');
    }
}
