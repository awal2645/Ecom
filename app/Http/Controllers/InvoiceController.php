<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shiping;
use PDF;
class InvoiceController extends Controller
{
    public function Invoice($id)
    {
        $orderDetails = Shiping::find($id);
        $product_details = Order::where('order_id', $orderDetails->order_id)->get();
        $product_price = Order::where('order_id', $orderDetails->order_id)->sum('price');
        $pdf = PDF::loadView('invoice',['orderDetails'=>$orderDetails , 'product_details' =>$product_details,'product_price'=>$product_price]);

        return $pdf->stream('orderDetails.pdf');
    }
    public function invoiceDownload($id)
    {
        $orderDetails = Shiping::find($id);
        $product_details = Order::where('order_id', $orderDetails->order_id)->get();
        $product_price = Order::where('order_id', $orderDetails->order_id)->sum('price');
        $pdf = PDF::loadView('invoice',['orderDetails'=>$orderDetails , 'product_details' =>$product_details,'product_price'=>$product_price]);

        return $pdf->download('orderDetails.pdf');
    }
}
