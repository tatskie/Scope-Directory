<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubPage extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id', 'title', 'slug', 'body'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Set the page title to lower case.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    /**
     * Get the pages title capital first letter.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * If user pages retrieve the model by the $slug instead of the default $id
     * If admin pages retrieve the model by $id
     */
    public function getRouteKeyName()
    {
         return Request::segment(1) === 'admin' ? 'id' : 'slug';
    }

    /**
     * Relationship to Page
     */
    public function page()
	{
	    return $this->belongsTo(Page::class);
	}
}
