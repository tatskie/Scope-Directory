<?php

namespace App\Http\Controllers\API\Teacher;

use App\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:teacher', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth('api')->user()->videos;
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
            'title'=>'required|string|max:255',
            'link'=>'nullable|string|max:500',
            'video'=>'nullable|string|max:2500',
        ]);

        $video = new Video([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'video' => $request->get('video'),
            'user_id' => auth('api')->user()->id
        ]);

        $video->save();

        return ['message' => 'Video Created Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return $video;
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
        $video = Video::findOrFail($id);

        $request->validate([
            'title'=>'required|string|max:255',
            'link'=>'nullable|string|max:500',
            'video'=>'nullable|string|max:2500',
        ]);

        $video->title = $request->get('title');
        $video->link = $request->get('link');
        $video->video = $request->get('video');

        $video->save();
        
        return ['message' => 'Video Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->destroy($video->id);
        
        return ['message' => 'Video Deleted!'];
    }
}
