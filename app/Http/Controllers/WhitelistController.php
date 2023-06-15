<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WhitelistController extends Controller
{
    public function whiteList()
    {


        return view('Frontend.whiteList');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToWhiteList(Request $request, $id)
    {
    
        $product = Product::findOrFail($id);
        if ($request->qty == 1) {
            $qty = 1;
        } else {
            $qty = $request->qty;
        }

        $whiteList = session()->get('whiteList', []);

        if (isset($whiteList[$id])) {
            $whiteList[$id]['quantity']++;
        } else {
            $whiteList[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => $qty,
                "price" => $product->price,
                "image" => $product->thumbnail_image
            ];
        }
        session()->put('whiteList', $whiteList);
        return redirect()->back()->with('message', 'Product added to White List successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $whiteList = session()->get('whiteList');
            $whiteList[$request->id]["quantity"] = $request->quantity;
            session()->put('whiteList', $whiteList);
            session()->flash('message', 'whiteList updated successfully');
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
            $whiteList = session()->get('whiteList');
            if (isset($whiteList[$request->id])) {
                unset($whiteList[$request->id]);
                session()->put('whiteList', $whiteList);
            }
            session()->flash('error', 'Product removed successfully');
        }
    }
    public function clearList(){
        session()->forget('whiteList');
        return redirect()->route('home')->with('message', 'whiteList Clear successfully');
    }
}
