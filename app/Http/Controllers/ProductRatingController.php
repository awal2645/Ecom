<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    public function ratingAdd(Request $request){
        $user = ProductRating::where('user_id', Auth::user()->id)->first();
        $data = [
        'rating' => $request->rating,
        'product_id' => $request->product_id,
        'user_id' => Auth::user()->id,
        'comment' => $request->comment,
       ];
       if(isset($user)){
        $user->update($data);
       }else{
        ProductRating::create($data);
       }
       return redirect()->back()->with('message', 'Rating added to successfully!');
    }
}
