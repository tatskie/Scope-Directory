<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use SoftDeletes;

    /**
     *
     * @var 
     */
    protected $table = 'scope_receipts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'is_expire', 'expire_at', 'user_id', 'tif_id', 'category_id', 'aif_id', 'academia_id'
    ];

    /**
     *
     * @var array
     */
    protected $dates = ['expire_at', 'deleted_at'];

    /**
     * Relationship to user
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Relationship to tif
     */
    public function tif()
    {
      return $this->belongsTo(TIF::class, 'tif_id');
    }

    /**
     * Relationship to aif
     */
    public function aif()
    {
      return $this->belongsTo(AIF::class, 'aif_id');
    }

    /**
     * Relationship to licenseCategory
     */
    public function licenseCategory()
    {
      return $this->belongsTo(LicenseCategory::class, 'category_id');
    }

    /**
     * Relationship to AcademiaCategory
     */
    public function academiaCategory()
    {
      return $this->belongsTo(AcademiaCategory::class, 'academia_id');
    }

    /**
     * Relationship Has many to shipping
     */
    public function shippingAddress()
    {
      return $this->hasMany(Shipping::class);
    }
}
