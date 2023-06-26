<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchResault()
    {

        $categories = Category::all();
        if(request('category')){
            $products = Product::where('category_id',request('category'))->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('details', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')->paginate(10);
        }else{
            $products = Product::where('name', 'like', '%' . request('search') . '%')
            ->orWhere('details', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')->paginate(10);
        }
        
        $latest_products = Product::latest()->take(3)->get();
        return view('Frontend.search', ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products]);
    }
    // public function shopFilter(){

    //     $categories = Category::all();
    //     $products = Product::whereBetween('price',[request('min'), request('max')])->paginate(5);
    //     $latest_products = Product::latest()->take(3)->get();
    //     return view('Frontend.shop',['products' => $products,'categories' => $categories,'latest_products' => $latest_products]);
    // }

    public function shopFilter(Request $request)
    {
        // dd($request->all());
        $categories = Category::all();
        $latest_products = Product::latest()->take(3)->get();
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $products = Product::whereBetween('price', [$min_price, $max_price])->paginate(5);
        return view('Frontend.shop', ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products]);
    }

    public function shortBy(Request $request)
    {
        $data = $request->data;

        // $products = '';
        // Query the products table based on the sort column and order
        if ($data == 'asc') {
            $products = Product::orderBy('name', $data,)->paginate(10);
        } elseif ($data == 'back') {
            return redirect()->route('shop.page');
        } else {
            $products = Product::orderBy('price', $data)->paginate(10);
        }

        // foreach($result as $product){
        //     $products.= '<div class="col-lg-4 col-md-6 col-sm-6" id="product-container">
        //             <div class="product__item">

        //                 <div class="product__item__pic set-bg" data-setbg="">
        //                 <img src="'.$product->thumbnail_image .'" alt="">
        //                 <ul class="product__item__pic__hover">
        //                         <li><a href="#"><i class="fa fa-heart"></i></a></li>
        //                         <li><a href="#"><i class="fa fa-retweet"></i></a></li>
        //                         <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
        //                     </ul>
        //                 </div>
        //                 <div class="product__item__text">
        //                     <h6><a href="'.route('shop.details.page',$product->slug).'">'.$product->name.'</a></h6>
        //                     <h5>$'.$product->price.'</h5>
        //                 </div>
        //             </div>
        //         </div>';
        // }	
        // echo $products;
        $categories = Category::all();
        $latest_products = Product::latest()->get();
        return view("Frontend.shop", ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products]);

        // return response()->json($products);
    }

    public function shortByCategory(Request $request, $slug)
    {
        $product_category_slug = $slug;
        $product_category_id = Category::where('slug', $slug)->first();
        $data = $request->data;
        $nav = 'nav';
        // $products = '';
        // Query the products table based on the sort column and order
        if ($data == 'asc') {
            $products = Product::where('category_id', $product_category_id->id)->orderBy('name', $data,)->paginate(10);
        } elseif ($data == 'back') {
            return redirect()->route('shop.page', $product_category_slug);
        } else {
            $products = Product::where('category_id', $product_category_id->id)->orderBy('price', $data)->paginate(10);
        }
        $categories = Category::all();
        $latest_products = Product::latest()->get();
        return view("Frontend.category", ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products, 'product_category_slug' => $product_category_slug, 'nav' => $nav]);

        // return response()->json($products);
    }
}
