<?php

namespace App\Http\Controllers;

use App\Models\Category;
use File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryList()
    {
        $categoryLists = Category::all();
        return view('Backend.Category.categoryList',['categoryLists'=>$categoryLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoryAdd()
    {
        return view('Backend.Category.categoryAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function categoryStore(Request $request)
    {
    
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'image' => 'required',
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
        Category::create( $data);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryEdit($id)
    {
        $categoryEdit = Category::find($id);
       return view('Backend.Category.categoryEdit',['categoryEdit' => $categoryEdit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request,  $id)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            ]);
        $categoryUpdate = Category::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";
            if (!empty($categoryUpdate->image)) {
                File::delete(public_path() . $categoryUpdate->image);
            }
        } else {
            $imgpath = $request->img_name;
        } 
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imgpath,
        ];
        $categoryUpdate->update( $data);
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoryDelete( $id)
    {
         Category::find($id)->delete();
         return redirect()->back();
    
    }
}
