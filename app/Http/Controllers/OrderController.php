<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shiping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;


class OrderController extends Controller
{
    //order list controller 

     public function orderList(){
        $orderLists=Shiping::latest()->get();
        return view("Backend.Order.orderList", ['orderLists'=>$orderLists]);
     }
    
    //order store ontroller

    public function order(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
        ]);
        $cart_data = session('cart');
        $user_id = Auth::user()->id;
        $data = Shiping::where('user_id', $user_id)->orderBy('order_id', 'desc')->first();
        if (isset($data->order_id)) {
            $order_id = $data->order_id + 1;
        } else {
            $order_id = 1;
        }
        $save_data = [];
        foreach ($cart_data as $data) {
            $save_data[] = [
                'product_name' => $data['name'],
                'product_img' => $data['image'],
                'qty' => $data['quantity'],
                'user_id' => $user_id,
                'order_id' => $order_id,
                'price' => $data['price'],
            ];
        }
        session()->forget('cart');
        DB::table('orders')->insert($save_data);
        if (isset($request->discount_amount)) {
            $discount_amount = $request->discount_amount;
        } else {
            $discount_amount = 0;
        }
        $shiping_data = Shiping::create([
            'user_id' => $user_id,
            'order_id' => $order_id,
            'discount_amount' => $discount_amount,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'address' => $request->address,
        ]);
        return redirect()->route('stripe');
    }
    public function myOrder()
    {
        $order = Shiping::where('user_id', Auth::user()->id)->orderBy('order_id')->get();
        return view('Frontend.myorder', ['order' => $order]);
    }

    public function myOrderEdit($id = null)
    {

        $edit_order = Order::where('order_id', $id)->where('user_id', Auth::user()->id)->get();

        return view('Frontend.editMyOrder', ['edit_order' => $edit_order]);
    }

    public function updateMyOrder(Request $request)
    {
        $update_order = Order::find($request->id);
        if($update_order->payment_status == "Paid"){
            session()->flash('error', 'This Order Already Compelete!');
        }
        else{
            if ($request->id && $request->quantity) {
                $update_order->qty = $request->quantity;
                $update_order->update();
                session()->flash('message', 'Product removed successfully');
            }
        }
      
    }
    public function orderRemove(Request $request)
    {
        if ($request->id) {
            $orderRemove = Order::findOrFail($request->id);
            $orderId = Order::where('order_id', $orderRemove->order_id)->get();
            if (count($orderId) == 1) {
                $shipingId = Shiping::where('order_id',  $orderRemove->order_id)->first();
                $shipingId->delete();
            }
            if (isset($orderRemove)) {
                $orderRemove->delete();
            }


            session()->flash('error', 'Product removed successfully');
        }
    }

    public function orderStatusUpdate(Request $request){
       
        $orderId = Shiping::find($request->order_id);
        $orderId->shiping_status = $request->data;
        $orderId->update();
         return redirect()->back();


    }
}
