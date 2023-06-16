<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use File;
class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function productList()
    {
        $productLists = Product::all();
        return view('Backend.Product.productList',['productLists'=>$productLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productAdd()
    {
        return view('Backend.Product.productAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function productStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
            'image' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
        } 
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imgpath,
        ];
        Product::create( $data);
        return redirect()->back()->with('message', 'Product Add successful!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productEdit($id)
    {
        $productEdit = Product::find($id);
       return view('Backend.Product.productEdit',['productEdit' => $productEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function productUpdate(Request $request,  $id)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            ]);
        $productUpdate  = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if (!empty($productUpdate ->image)) {
                File::delete(public_path() . $productUpdate ->image);
            }
        } else {
            $imgpath = $request->img_name;
        } 
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imgpath,
        ];
        $productUpdate ->update( $data);
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function productDelete( $id)
    {
        Product::find($id)->delete();
         return redirect()->back()->with('error', 'Delete successful!');
    
    }
}
