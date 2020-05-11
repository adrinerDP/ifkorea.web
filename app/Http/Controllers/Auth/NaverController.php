<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class NaverController extends Controller
{
    /**
     * Redirect the user to the Naver authentication page.
     */
    public function redirectToProvider()
    {
        return \Socialite::with('naver')->redirect();
    }

    /**
     * Obtain the user information from Naver.
     */
    public function handleProviderCallback()
    {
        try {
            $user = \Socialite::with('naver')->user();
        } catch (Laravel\Socialite\Two\InvalidStateException $e) {
            return $this->redirectToProvider();
        }

        $user = User::updateOrCreate([
            'name' => $user->getName(),
            'nickname' => $user->getNickName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
            'sns_type' => 'naver'
        ]);

        \Auth::login($user);

        return \Redirect::home();
    }
}
