<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showAdminProfile(){
    
        return view('Backend.Profile.profile');
    }

    public function updateAdminDetails (Request $request){

        $user_id = auth('admin')->user()->id;
        $user_update= Admin::where('id',$user_id);
        if ($request->hasFile('image')) {
        $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";

        // old image delete 
        if (isset($user_update->image)) {
            File::delete(public_path() . $user_update->image);
        }
        
        }else{
            $imgpath = $request->img_name;
        }
        $data =
            [ 
                'name' => $request->name,
                'image'=> $imgpath,
            ];
           
            $user_update->update($data);
            return redirect()->back()->with('message','Data Update Successfully');
    }
    
    //password update controller 
    public function updateAdminPassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]); 
        if(Hash::check($request->old_password , auth('admin')->user()->password)) {
            if(!Hash::check($request->new_password , auth('admin')->user()->password)) {
               $user = Admin::find(auth('admin')->user()->id);
               $user->update([
                   'password' => bcrypt($request->new_password)
               ]);
               return redirect()->back()->with('message','Password updated successfully!');
            }
            return redirect()->back()->with('error','New password can not be same old password!');
        }
        return redirect()->back()->with('error','Old password does not matched!');

    }
}
