<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\SubPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubPageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:sub_pages',
            'body'=>'required',
        ]);

        $subPage = new SubPage([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title'), '-'),
            'page_id' => $request->get('page_id'),
            'body' => $request->get('body'),
        ]);
        $subPage->save();

        return ['message' => 'Sub Page Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subpages = Page::findOrFail($id)->subPages()->paginate(10);

        return $subpages;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubPage $subPage)
    {
        $request->validate([
            'title'=>'required|unique:sub_pages,title,'.$subPage->id,
            'body'=>'required'
        ]);
        
        $subPage->title = $request->get('title');
        $subPage->slug = str_slug($request->get('title'), '-');
        $subPage->body = $request->get('body');
        $subPage->save();

        return ['message' => 'Sub Page Edited Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubPage  $subPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubPage $subPage)
    {
        $subPage->destroy($subPage->id);
        return ['message' => 'Sub Page Deleted Successfully!'];
    }
}
