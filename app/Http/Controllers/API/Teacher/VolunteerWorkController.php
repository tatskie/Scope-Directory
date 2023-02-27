<?php

namespace App\Http\Controllers\API\Teacher;

use App\VolunteerWork;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VolunteerWorkController extends Controller
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
        return auth('api')->user()->volunteerWork;
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
            'volunteer_work'=>'required|string|max:5000',
        ]);

        $volunteerWork = new VolunteerWork([
            'volunteer_work' => $request->get('volunteer_work'),
            'user_id' => auth('api')->user()->id
        ]);

        $volunteerWork->save();

        return ['message' => 'Volunteer Work Created Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteerWork = VolunteerWork::findOrFail($id);

        return $volunteerWork;
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
        $volunteerWork = VolunteerWork::findOrFail($id);

        $request->validate([
            'volunteer_work'=>'required|string|max:2500',
        ]);

        $volunteerWork->volunteer_work = $request->get('volunteer_work');

        $volunteerWork->save();
        
        return ['message' => 'Volunteer Work Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $volunteerWork = VolunteerWork::findOrFail($id);
        $volunteerWork->destroy($volunteerWork->id);
        
        return ['message' => 'Volunteer Work Deleted!'];
    }
}
