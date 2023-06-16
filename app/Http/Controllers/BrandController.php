<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use File;

class BrandController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function brandList()
    {
        $brandLists = Brand::all();
        return view('Backend.Brand.brandList',['brandLists'=>$brandLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function brandAdd()
    {
        return view('Backend.Brand.brandAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function brandStore(Request $request)
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
        Brand::create( $data);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function brandEdit($id)
    {
        $brandEdit = Brand::find($id);
       return view('Backend.Brand.brandEdit',['brandEdit' => $brandEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function brandUpdate(Request $request,  $id)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            ]);
        $brandUpdate  = Brand::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if (!empty($brandUpdate ->image)) {
                File::delete(public_path() . $brandUpdate ->image);
            }
        } else {
            $imgpath = $request->img_name;
        } 
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imgpath,
        ];
        $brandUpdate ->update( $data);
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function brandDelete( $id)
    {
         Brand::find($id)->delete();
         return redirect()->back();
    
    }
}
