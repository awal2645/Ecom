<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddToCart extends Controller
{
    public function cart()
    {


        return view('Frontend.shoping_cart');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        if ($request->qty == 1) {
            $qty = 1;
        } else {
            $qty = $request->qty;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $qty,
                "price" => $product->price,
                "image" => $product->thumbnail_image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('message', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('error', 'Product removed successfully');
        }
    }

}
