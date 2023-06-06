<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(): View
    {
        $order_id = Order::where('user_id', Auth::user()->id)->orderBy('order_id', 'desc')->first();
        $order =  Order::where('user_id', Auth::user()->id)->where('order_id', $order_id->order_id)->get();

        return view('stripe', ['order' => $order, 'order_id' => $order_id]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): RedirectResponse
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from "
        ]);
        $updaeId = Order::where('order_id',$request->order_id)->get();
        foreach($updaeId as $data){
            $data->payment_status = "Paid";
            $data->update();
        }
        
        return redirect()->route('my.order')->with('message', 'Payment successful!');
    }
}
