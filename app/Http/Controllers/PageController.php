<?php

namespace App\Http\Controllers;

use App\Page;
use App\Plan;
use App\SubPage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        // $plans = Plan::where('is_corporate', 0)->get();
        // $pages = Page::all();
        
        // return view('welcome', compact(['pages', 'plans']));

        return redirect()->to('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $pages = Page::all();
        return view('pages.default-page', compact(['page', 'pages']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function showSubPage(Page $page, SubPage $subpage)
    {
        $pages = Page::all();
        return view('pages.subpages.default-page', compact(['subpage', 'pages']));
    }
}
