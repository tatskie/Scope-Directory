<?php

namespace App\Http\Controllers\Corporate;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // $plan = Plan::where('is_corporate', 1)->first();
        
        return view('corporate.dashboard');
    }
}
