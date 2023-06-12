<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use Illuminate\Http\Request;
use File;

class SocialAccountController extends Controller
{
    public function showSocialAccount(){
        $socialAccouonts = SocialAccount::all();
        return view('Backend.Frontend.socialAccount', ['socialAccouonts'=>$socialAccouonts]);
    }

    public function socialAccountStore(Request $request)
    {
    
        $validated = $request->validate([
            'name' => 'required|unique:social_accounts',
            ]);
      
        $data = [
            'name' => $request->name,
            'icon_name' => $request->icon_name,
            'link' => $request->link,
            
        ];
        SocialAccount::create( $data);
        return redirect()->back()->with('message','Data Create Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function socialAccountEdit($id)
    { 
        $socialAccouonts = SocialAccount::all();

        $socialAccountEdit = SocialAccount::find($id);
        
       return view('Backend.Frontend.socialAccountEdit',['socialAccountEdit' => $socialAccountEdit , 'socialAccouonts' => $socialAccouonts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function socialAccountUpdate(Request $request,  $id)
    {
        
        
        $socialAccountUpdate = SocialAccount::find($id);
      
        $data = [
            'name' => $request->name,
            'icon_name' => $request->icon_name,
            'link' => $request->link,
            
        ];
        $socialAccountUpdate->update( $data);

        return redirect()->route('show.social.account')->with('message','Data Update Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function socialAccountDelete( $id)
    {
        SocialAccount::find($id)->delete();

         return redirect()->back()->with('error','Data Delete Successfully');
    
    }
}
