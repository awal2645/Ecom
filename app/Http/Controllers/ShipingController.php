<?php

namespace App\Http\Controllers;

use App\Models\Shiping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipingController extends Controller
{
    public function order(Request $request)
    {

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
                'qty' => $data['quantity'],
                'user_id' => $user_id,
                'order_id' => $order_id,
                'price' => $data['price'],

            ];
        }
        session()->forget('cart');
        DB::table('shipings')->insert($save_data);

        return redirect()->back();
    }
}
