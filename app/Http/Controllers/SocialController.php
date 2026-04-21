<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::updateOrCreate([
                'provider_id' => $socialUser->id,
                'provider_name' => $provider,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
                'student_id' => '211204123', // Thay bằng MSV thật của bạn
            ]);

            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Đăng nhập thất bại!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
