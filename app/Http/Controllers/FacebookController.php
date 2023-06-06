<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class FacebookController extends Controller
{


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $fb_user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $fb_user->id)->first();

            if ($finduser) {

                $newUser = User::create([
                    'name' => $fb_user->name,
                    'facebook_id' => $fb_user->id,
                ]);

                Auth::login(!$newUser);

                return redirect()->intended('profile');
            } else {
                Auth::login($finduser);

                return redirect()->intended('profile');
            }
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }
}
