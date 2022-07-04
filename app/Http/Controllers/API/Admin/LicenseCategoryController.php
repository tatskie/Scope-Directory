<?php

namespace App\Http\Controllers\API\Admin;

use App\AcademiaCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class LicenseCategoryController extends Controller
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
        return AcademiaCategory::orderBy('id', 'asc')->with('cards')->get();
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
            'number'=>'required|integer|unique:academia_categories',
            'specialist_title'=>'required|string|max:255',
            'class'=>'required|string|unique:academia_categories',
            'points_minimum'=>'required|integer',
            'points_maximum'=>'required|integer',
            'fee'=>'required|integer'
        ]);

        $category = new AcademiaCategory([
            'number' => $request->get('number'),
            'specialist_title' => $request->get('specialist_title'),
            'class' => $request->get('class'),
            'criteria_notes' => $request->get('criteria_notes'),
            'points_minimum' => $request->get('points_minimum'),
            'points_maximum' => $request->get('points_maximum'),
            'fee' => $request->get('fee'),
            'shipping' => $request->get('shipping'),
        ]);

        $category->save();

        return ['message' => 'Academic Category Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = AcademiaCategory::findOrFail($id);

        return Response::json($category);
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
        $category = AcademiaCategory::findOrFail($id);

        $request->validate([
            'number'=>'required|integer|unique:academia_categories,number,'.$category->id,
            'specialist_title'=>'required|string|max:255',
            'class'=>'required|string|unique:academia_categories,class,'.$category->id,
            'points_minimum'=>'required|integer',
            'points_maximum'=>'required|integer',
            'fee'=>'required|integer'
        ]);

        $category->number = $request->get('number');
        $category->specialist_title = $request->get('specialist_title');
        $category->class = $request->get('class');
        $category->criteria_notes = $request->get('criteria_notes');
        $category->points_minimum = $request->get('points_minimum');
        $category->points_maximum = $request->get('points_maximum');
        $category->fee = $request->get('fee');
        $category->shipping = $request->get('shipping');

        $category->save();

        return ['message' => 'Academia Category Updated Successfuly!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = AcademiaCategory::findOrFail($id);

        $category->destroy($category->id);

        return ['message' => 'Category Deleted!'];
    }
}
