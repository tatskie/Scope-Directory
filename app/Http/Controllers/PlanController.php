<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Page;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        $pages = Page::all();
        return view('plans.index', compact(['plans', 'pages']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan, Request $request)
    {
        $pages = Page::all();
        
        $request->user()->createAsStripeCustomer();
        
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();

        return view('plans.show', compact(['plan', 'pages', 'intent']));
    }
}
