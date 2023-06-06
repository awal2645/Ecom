<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserDetailsController extends Controller
{
    public function updateUserDetails(Request $request)
    {

        $request->validate([
            'phone' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $user_update = UserDetails::where('user_id', $user_id)->first();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $imgpath = "/storage/images/$fileName";

            if (!empty($user_update->image)) {
                File::delete(public_path() . $user_update->image);
            }
        } else {
            $imgpath = $request->img_name;
        }
        $data =
            [
                'phone' => $request->phone,
                'user_id' => $user_id,
                'address' => $request->address,
                'postcode' => $request->postcode,
                'state' => $request->state,
                'country' => $request->country,
                'image' => $imgpath,
            ];

        if (empty($user_update)) {
            UserDetails::create($data);
        } else {
            $user_update->update($data);
        }

        return redirect()->back()->with('message', 'Data Update Successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            if (!Hash::check($request->new_password, auth()->user()->password)) {
                $user = User::find(auth()->id());
                $user->update([
                    'password' => bcrypt($request->new_password)
                ]);
                return redirect()->back()->with('message', 'Password updated successfully!');
            }
            return redirect()->back()->with('error', 'New password can not be same old password!');
        }
        return redirect()->back()->with('error', 'Old password does not matched!');
    }
}
