<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                    return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                    "google_id" => $user->getId(),
                    "level" => 2,
                    "member" => 1,
                    "password" => encrypt('customer0002'),
                ]);
                Auth::login($newUser);
                    return redirect()->intended('/');
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
