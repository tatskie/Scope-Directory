<?php

namespace App\Http\Controllers\API\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
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
        return Product::latest()->paginate(10);
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
            'name'=>'required|unique:products',
            'details'=>'required',
            'price'=>'required|integer'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name'), '-'),
            'details' => $request->get('details'),
            'price' => $request->get('price'),
            'description' => $request->get('description')
        ]);
        $product->save();

        return ['message' => 'Product Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return Response::json($product);
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
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name'=>'required|unique:products,name,'.$product->id,
            'details'=>'required',
            'price'=>'required|integer'
        ]);

        $product->name = $request->get('name');
        $product->slug = str_slug($request->get('name'), '-');
        $product->details = $request->get('details');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->save();

        return ['message' => 'Product Updated Successfully!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        $product->destroy($product->id);
        
        return ['message' => 'Product Deleted!'];
    }
}
