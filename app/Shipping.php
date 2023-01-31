<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    /**
     *
     * @var 
     */
    protected $table = 'shipping';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'street_address', 'building', 'city', 'country', 'zip_code', 'phone_number', 'status', 'user_id', 'receipt_id'
    ];

    /**
     * Relationship belongs To User
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * Relationship belongs To Receipt
     */
    public function receipt()
    {
      return $this->belongsTo(Receipt::class);
    }
}
