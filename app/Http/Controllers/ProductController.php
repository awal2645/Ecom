<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
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

        return view('Backend.Product.productList', ['productLists' => $productLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productAdd()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('Backend.Product.productAdd', ['categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function productStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'thumbnail_image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        $status = 1;
        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
        }
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $file->storeAs('public/images', $imageName);
                $imagePath = "/storage/images/$imageName";

                $images[] = [
                    'imagePath' => $imagePath,
                ];
            }
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'availability' => $request->availability,
            'featured_product' => $request->featured_product,
            'unit' => $request->unit,
            'details' => $request->details,
            'slug' => $request->slug,
            'status' => $status,
            'description' => $request->description,
            'thumbnail_image' => $imgpath,
            'images' => $images,
        ];
        Product::create($data);
        return redirect()
            ->back()
            ->with('message', 'Product Add successful!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productEdit($id)
    {
        $productEdit = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('Backend.Product.productEdit', ['productEdit' => $productEdit, 'categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function productUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $productUpdate = Product::find($id);
        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if (!empty($productUpdate->thumbnail_image)) {
                File::delete(public_path() . $productUpdate->image);
            }
        } else {
            $imgpath = $request->image;
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'availability' => $request->availability,
            'featured_product' => $request->featured_product,
            'unit' => $request->unit,
            'details' => $request->details,
            'slug' => $request->slug,
            'description' => $request->description,
            'thumbnail_image' => $imgpath,
        ];
        $productUpdate->update($data);
        return redirect()
            ->back()
            ->with('message', 'Product Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function productDelete($id)
    {
        Product::find($id)->delete();
        return redirect()
            ->back()
            ->with('error', 'Delete successful!');
    }
}
