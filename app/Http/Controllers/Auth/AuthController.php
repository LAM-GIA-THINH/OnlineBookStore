<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
        
            $facebookUser = Socialite::driver('facebook')->user();
         
            $user = User::where('provider_id', $facebookUser->getId())->first();
         
            if($user){
         
                Auth::login($user);
       
                return redirect()->intended('');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $facebookUser->getEmail()],[
                        'name' => $facebookUser->getName(),
                        'email' => $facebookUser->getEmail(),
                        'order_email' => $facebookUser->getEmail(),
                        'provider_id'=> $facebookUser->getId(),
                        'provider' => 'facebook',
                        'password' => bcrypt(Str::random(8)),
                        'profile_photo_path' => $facebookUser->getAvatar()
                    ]);

                Auth::login($newUser);
        
                return redirect()->intended('');
            }
       
        } catch (\Throwable $th) {
            return redirect(route('login'))->with('error', 'Đã xảy ra lỗi khi thực hiên đăng nhập bằng facebook. Vui lòng thử lại sau');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('provider_id', $googleUser->getId())->first();

            if($user) {
                Auth::login($user);
                return redirect()->intended('');
            } else {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'order_email' => $googleUser->getEmail(),
                    'provider_id' => $googleUser->getId(),
                    'email_verified_at' => date('m/d/Y h:i:s a', time()),
                    'password' => bcrypt(Str::random(8)),
                    'provider' => 'google',
                    'profile_photo_path' => $googleUser->getAvatar()
                ]);
                Auth::login($newUser);
                return redirect()->intended('');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect(route('login'))->with('error', 'Đã xảy ra lỗi khi thực hiên đăng nhập bằng google. Vui lòng thử lại sau');
        }
    }
}
