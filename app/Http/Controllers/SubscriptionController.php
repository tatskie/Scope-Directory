<?php

namespace App\Http\Controllers;

use App\Page;
use App\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('subscription.index', compact('pages'));
    }

    /**
     * For creating a new subscription for individual user.
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
        $user->newSubscription('main', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);
        
        return redirect()->route('subscribed.show', $plan->slug)->with('success', 'Your plan subscribed successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan, Request $request)
    {
        $pages = Page::all();

        // $request->user()->subscribed('main', $plan->stripe_plan); | Determine if user has subcribed this plan.

        return view('subscription.show', compact(['pages', 'plan']));
    }
}
