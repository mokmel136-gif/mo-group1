<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->intended('/dashboard');
            } else {
                $checkUser = User::where('email', $googleUser->email)->first();

                if ($checkUser) {
                    $checkUser->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar
                    ]);
                    Auth::login($checkUser);
                } else {
                    $newUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                        'password' => null
                    ]);

                    Auth::login($newUser);
                }

                return redirect()->intended('/dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong with Google Login: ' . $e->getMessage());
        }
    }
}
