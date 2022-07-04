<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'details', 'price', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * If user pages retrieve the model by the $slug instead of the default $id
     * If admin pages retrieve the model by $id
     */
    public function getRouteKeyName()
    {
         return Request::segment(1) === 'admin' ? 'id' : 'slug';
    }
}
