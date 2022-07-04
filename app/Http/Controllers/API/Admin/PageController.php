<?php

namespace App\Http\Controllers\API\Admin;

use App\Page;
use App\SubPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:admin', 'verified', 'twofactor']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Page::latest()->paginate(10);
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
        
        return Response::json($page);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);

        return Response::json($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title'=>'required|unique:pages,title,'.$page->id,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        $page->destroy($page->id);

        return ['message' => 'Page Deleted Successfully!'];
    }
}
