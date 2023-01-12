<?php

namespace App\Http\Controllers\API\Teacher;

use App\Award;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AwardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:academia', 'verified', 'twofactor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth('api')->user()->awards;
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
            'name'=>'required|string|max:255',
            'location'=>'nullable|string|max:500',
            'link'=>'nullable|string|max:2500',
        ]);

        $award = new Award([
            'name' => $request->get('name'),
            'location' => $request->get('location'),
            'link' => $request->get('link'),
            'user_id' => auth('api')->user()->id
        ]);

        $award->save();

        return ['message' => 'Special Award Created Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $award = Award::findOrFail($id);

        return $award;
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
        $award = Award::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            'location'=>'nullable|string|max:500',
            'link'=>'nullable|string|max:2500',
        ]);

        $award->name = $request->get('name');
        $award->link = $request->get('link');
        $award->location = $request->get('location');

        $award->save();
        
        return ['message' => 'Special Award Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $award = Award::findOrFail($id);
        $award->destroy($award->id);
        
        return ['message' => 'Special Award Deleted!'];
    }
}
