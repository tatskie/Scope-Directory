<?php

namespace App\Http\Controllers\Corporate;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan, Request $request)
    {
        $request->user()->createAsStripeCustomer();
        
        $paymentMethods = $request->user()->paymentMethods();

        $intent = $request->user()->createSetupIntent();
        
        return view('corporate.subscription.show', compact(['plan', 'intent']));
    }

    /**
     * For creating a new subscription for corporate user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('main', $plan->stripe_plan)->create($paymentMethod, ['email' => $user->email,]);
      
        return redirect()->route('corporate.dashboard')->with('success', 'Your plan subscribed successfully');
    }
}
