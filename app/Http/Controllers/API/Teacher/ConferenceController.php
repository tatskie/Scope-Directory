<?php

namespace App\Http\Controllers\API\Teacher;

use App\Conference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConferenceController extends Controller
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
        return auth('api')->user()->conferences;
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
            'year'=>'required|integer|min:1900|max:2022',
            'name'=>'required|string|max:255',
            'location'=>'nullable|string|max:500',
            'link'=>'nullable|string|max:500',
        ]);

        $conference = new Conference([
            'year' => $request->get('year'),
            'name' => $request->get('name'),
            'location' => $request->get('location'),
            'link' => $request->get('link'),
            'user_id' => auth('api')->user()->id
        ]);

        $conference->save();

        return ['message' => 'Conference Created Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conference = Conference::findOrFail($id);

        return $conference;
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
        $conference = Conference::findOrFail($id);

        $request->validate([
            'year'=>'required|integer|min:1900|max:2022',
            'name'=>'required|string|max:255',
            'location'=>'nullable|string|max:500',
            'link'=>'nullable|string|max:500',
        ]);

        $conference->year = $request->get('year');
        $conference->name = $request->get('name');
        $conference->location = $request->get('location');
        $conference->link = $request->get('link');

        $conference->save();
        
        return ['message' => 'Conference Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->destroy($conference->id);
        
        return ['message' => 'Conference Deleted!'];
    }
}
