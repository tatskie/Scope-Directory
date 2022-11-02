<?php

namespace App\Http\Controllers\API\Teacher;

use App\AcademicPublication;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicPublicationController extends Controller
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
        return auth('api')->user()->academicPublications;
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
            'title'=>'required|string|max:255',
            'journal'=>'nullable|string|max:500',
            'doi'=>'nullable|string|max:500',
            'source'=>'nullable|string|max:2500'
        ]);

        $academicPublication = new AcademicPublication([
            'year' => $request->get('year'),
            'title' => $request->get('title'),
            'journal' => $request->get('journal'),
            'doi' => $request->get('doi'),
            'source' => $request->get('source'),
            'user_id' => auth('api')->user()->id
        ]);

        $academicPublication->save();

        return ['message' => 'Publication Created Successfully!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academicPublication = AcademicPublication::findOrFail($id);

        return $academicPublication;
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
        $academicPublication = AcademicPublication::findOrFail($id);

        $request->validate([
            'year'=>'required|integer|min:1900|max:2022',
            'title'=>'required|string|max:2500',
            'journal'=>'nullable|string|max:500',
            'doi'=>'nullable|string|max:500',
            'source'=>'nullable|string|max:500'
        ]);

        $academicPublication->year = $request->get('year');
        $academicPublication->title = $request->get('title');
        $academicPublication->journal = $request->get('journal');
        $academicPublication->doi = $request->get('doi');
        $academicPublication->source = $request->get('source');

        $academicPublication->save();
        
        return ['message' => 'Publication Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicPublication = AcademicPublication::findOrFail($id);
        $academicPublication->destroy($academicPublication->id);
        
        return ['message' => 'Publication Deleted!'];
    }
}
