<?php

namespace App\Http\Controllers\API\Academia;

use App\Shipping;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
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
        return auth('api')->user()->shippingAddress->last();
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
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'street_address'=>'required|string|max:500',
            'building'=>'nullable|string|max:500',
            'city'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'zip_code'=>'required|integer',
            'phone_number'=>'required|string|max:255'   
        ]);

        $shipping = new Shipping([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'street_address' => $request->get('street_address'),
            'building' => $request->get('building'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'zip_code' => $request->get('zip_code'),
            'phone_number' => $request->get('phone_number'),
            'status' => 'Order Received',
            'user_id' => auth('api')->user()->id
        ]);

        $shipping->save();

        return ['message' => 'Shipping Created Successfully!'];
    }
}
