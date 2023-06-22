<?php

namespace App\Http\Controllers;

use App\Models\FrontnendSetting;
use File;
use Illuminate\Http\Request;

class FrontnendSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function frontendSetting()
    {
        $frontendData = FrontnendSetting::all()->first();

        return view('Backend.Frontend.frontendSetting', ['frontendData' => $frontendData]);
    }

    public function frontendSettingUpdate(Request $request,  $id)
    {
        
        $frontend = FrontnendSetting::find($id);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $logPath = "/storage/images/$fileName";
            if (!empty($frontend->logo)) {
                File::delete(public_path() . $frontend->logo);
            }
        } else {
            $logPath = $request->img_logo;
        } 
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $bannerPath = "/storage/images/$fileName";
            if (!empty($frontend->banner)) {
                File::delete(public_path() . $frontend->banner);
            }
        } else {
            $bannerPath = $request->img_banner;
        } 
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'openig_time' => $request->openig_time,
            'camping_headline' => $request->camping_headline,
            'logo' => $logPath,
            'banner' => $bannerPath,
        ];
        $frontend->update( $data);
        return redirect()->back();
        
    }
}
