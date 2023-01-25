<?php

namespace App\Http\Controllers\API\Teacher;

use App\AcademicInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicInformationController extends Controller
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
        return auth('api')->user()->academicInformation;
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
            'employer'=>'required|string|max:255',
            'index'=>'required|int',
            'from'=>'required|date',
            'to'=>'nullable|date',
            'bio'=>'required|string|max:2500',
            'additional_information' => 'nullable|string|max:500',
        ]);

        $academicInformation = new AcademicInformation([
            'employer' => $request->get('employer'),
            'index' => $request->get('index'),
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'is_present' => $request->get('is_present'),
            'bio' => $request->get('bio'),
            'user_id' => auth('api')->user()->id,
            'additional_information' => $request->get('additional_information'),
        ]);

        $academicInformation->save();

        return ['message' => 'Public Profile Published Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academicInformation = AcademicInformation::findOrFail($id);

        return $academicInformation;
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
        $academicInformation = AcademicInformation::findOrFail($id);
        
        $request->validate([
            'employer'=>'required|string|max:255',
            'index'=>'required|int',
            'from'=>'required|date',
            'to'=>'nullable|date',
            'bio'=>'required|string|max:2500',
            'additional_information' => 'nullable|string|max:500',
        ]);

        $academicInformation->employer = $request->get('employer');
        $academicInformation->index = $request->get('index');
        $academicInformation->from = $request->get('from');
        $academicInformation->to = $request->get('to');
        $academicInformation->is_present = $request->get('is_present');
        $academicInformation->bio = $request->get('bio');
        $academicInformation->additional_information = $request->get('additional_information');

        $academicInformation->save();
        
        return ['message' => 'Updated Successfully!'];
    }
}
