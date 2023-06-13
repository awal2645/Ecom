<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    //  home page controller

    public function homePage()
    {
        return view("Frontend.home");
    }

    //  shop page controller

    public function shopPage()
    {
        $products = Product::paginate(6);
        $latest_products = Product::latest()->get();
        $categories = Category::all();
        return view("Frontend.shop", ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products]);
    }

    //  checkout page controller

    public function checkoutPage(Request $request)
    {
        $code = $request->coupon_code;
        $ammount = Coupon::where('coupon_code', $code)->first();
        return view("Frontend.checkout", ['ammount' => $ammount]);
    }

    public function Coupon(Request $request)
    {
        $code = $request->coupon_code;
        if (isset(Auth::user()->google_id)) {
            $ammount = Coupon::where('coupon_code', $code)->first();
            return view("Frontend.checkout", ['ammount' => $ammount]);
        } else {
            return redirect()->back()->with('error', 'This coupon does not apply to you !');
        }
    }

    //  shoping_cart page controller

    public function shopingCartPage()
    {
        return view("Frontend.shoping_cart");
    }

    //  shop_details page controller

    public function shopDetailsPage($slug)
    {
        $product_details = Product::where('slug', $slug)->first();
        $related_products = Product::where('category_id', $product_details->category_id)->take(4)->get();
        $rating = ProductRating::where('product_id', $product_details->id)->get();
        $avg = ProductRating::where('product_id', $product_details->id)->sum('rating');
        return view("Frontend.shop_details", ['product_details' => $product_details, 'related_products' => $related_products,'rating'=>$rating,'avg' => $avg]);
    }

    //product category page

    public function categoryPage($slug)
    {
        $product_category_slug = $slug;
        $categories = Category::all();
        $product_category_id = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $product_category_id->id)->paginate(10);
        $latest_products = Product::latest()->get();
        return view("Frontend.category", ['products' => $products, 'categories' => $categories, 'latest_products' => $latest_products, 'product_category_slug' => $product_category_slug]);
    }

    //product category page

    public function blogCategoryPage($slug)
    {
        $blog_categories = BlogCategory::all();
        $blog_category_id = BlogCategory::where('slug', $slug)->first();
        $blogs = Blog::where('categories_id', $blog_category_id->id)->paginate(6);
        $latest_blogs = Blog::latest()->take(3)->get();
        return view("Frontend.blog_category", ['blogs' => $blogs, 'blog_categories' => $blog_categories, 'latest_blogs' => $latest_blogs]);
    }

    //  blog page controller

    public function blogPage()
    {
        $blogs = Blog::paginate(6);
        $blog_categories = BlogCategory::all();
        $latest_blogs = Blog::latest()->take(3)->get();
        return view("Frontend.blog", ['blogs' => $blogs, 'blog_categories' => $blog_categories, 'latest_blogs' => $latest_blogs]);
    }

    //  blog_details page controller

    public function blogDetailsPage($slug)
    {
        $blog_details = Blog::where('slug', $slug)->first();
        $blog_tag = Blog::with('tags')->get();
        $related_blogs = Blog::where('categories_id', $blog_details->categories_id)->take(3)->get();
        $blog_categories = BlogCategory::all();
        $latest_blogs = Blog::latest()->take(3)->get();
        return view("Frontend.blog_details", ['blog_details' => $blog_details, 'related_blogs' => $related_blogs, 'blog_categories' => $blog_categories, 'latest_blogs' => $latest_blogs]);
    }

    //  contact page controller

    public function contactPage()
    {
        return view("Frontend.contact");
    }
}
