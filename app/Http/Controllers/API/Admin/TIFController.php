<?php

namespace App\Http\Controllers\API\Admin;

use App\AIF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TIFController extends Controller
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
        return AIF::all();
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
            'number'=>'required|integer|unique:t_i_f_s',
            'title'=>'required|string|max:255',
            'points_minimum'=>'required|integer',
            'points_maximum'=>'required|integer'
        ]);

        $tif = new AIF([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'points_minimum' => $request->get('points_minimum'),
            'points_maximum' => $request->get('points_maximum')
        ]);

        $tif->save();

        return ['message' => 'AIF Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tif = AIF::findOrFail($id);

        return Response::json($tif);
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
        $tif = AIF::findOrFail($id);

        $request->validate([
            'number'=>'required|integer|unique:t_i_f_s,number,'.$tif->id,
            'title'=>'required|string|max:255',
            'points_minimum'=>'required|integer',
            'points_maximum'=>'required|integer'
        ]);

        $tif->number = $request->get('number');
        $tif->title = $request->get('title');
        $tif->points_minimum = $request->get('points_minimum');
        $tif->points_maximum = $request->get('points_maximum');

        $tif->save();

        return ['message' => 'License Category Updated Successfuly!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tif = AIF::findOrFail($id);

        $tif->destroy($tif->id);

        return ['message' => 'AIF Deleted!'];

    }
}
