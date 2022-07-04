<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\SubPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pages()
    {
        return Page::latest()->paginate(10);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LoadPage(Page $page, $id)
    {
        return $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:pages',
        ]);

        $page = new Page([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title'), '-'),
            'body' => $request->get('body'),
        ]);
        $page->save();
        
        return ['message' => 'Page Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        // $subPages = SubPage::latest()->where('page_id', $page->id)->paginate(10);
        // return Response::json($subPages);
        return view('admin.pages.subpages', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {

        $request->validate([
            'title'=>'required|unique:pages,title,'.$page->id,
            'body'=>'required'
        ]);
        
        $page->title = $request->get('title');
        $page->slug = str_slug($request->get('title'), '-');
        $page->body = $request->get('body');
        $page->save();

        return ['message' => 'Page Edited Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->destroy($page->id);
        return ['message' => 'Page Deleted Successfully!'];
    }
}
