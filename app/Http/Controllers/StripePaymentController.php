<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shiping;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Stripe\Event;

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
    public function stripeID($id){
        $order_id = Order::where('user_id', Auth::user()->id)->where('order_id', $id)->first();

        $order =  Order::where('user_id', Auth::user()->id)->where('order_id', $id)->get();
         if (isset($order_id)){
            return view('stripe', ['order' => $order, 'order_id' => $order_id]);
         }else{
            return redirect()->back();
         }
        
    }


    public function handleWebhook(Request $request): RedirectResponse
    {
       
        $payload = $request->all();
        $endpoint_secret =  Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); // Replace with your actual endpoint secret

        // Verify the webhook signature
        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = Event::constructFrom($payload, $sig_header, $endpoint_secret);
        } catch (\Exception $e) {
            Log::error('Webhook signature verification failed.', ['exception' => $e]);
            return response('Webhook Signature Verification Failed', 400);
        }

        // Handle specific event types
        switch ($event->type) {
            case 'charge.succeeded':
                $charge = $event->data->object;
                $orderId = $charge->metadata->order_id;
                $this->updateOrderPaymentStatus($orderId);
                
                break;
            // Add more cases for other relevant event types you want to handle

            default:
                // Handle unsupported event types or ignore them
                Log::info("Unhandled event type: {$event->type}");
                break;
        }
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
        $updaePaymentStatus = Shiping::where('order_id',$request->order_id)->first();
        $updaePaymentStatus->payment_status = "Paid";
        $updaePaymentStatus->update();
        return redirect()->route('my.order')->with('message', 'Payment successful!');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripePost(Request $request): RedirectResponse
    // {
       
       
    
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create([
    //         "amount" => $request->amount * 1,
    //         "currency" => "usd",
    //         "source" => $request->stripeToken,
    //         "description" => "Test payment from "
    //     ]);
    //     $updaeId = Order::where('order_id',$request->order_id)->get();
    //     foreach($updaeId as $data){
    //         $data->payment_status = "Paid";
    //         $data->update();
    //     }
    //     $updaePaymentStatus = Shiping::where('order_id',$request->order_id)->first();
    //     $updaePaymentStatus->payment_status = "Paid";
    //     $updaePaymentStatus->update();
    //     return redirect()->route('my.order')->with('message', 'Payment successful!');
    // }
}
