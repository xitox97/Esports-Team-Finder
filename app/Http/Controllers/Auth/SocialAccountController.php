<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialAccountService;

class SocialAccountController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return \Socialite::driver('steam')->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $accountService)
    {

        $provider = 'steam';

        try {
            $user = \Socialite::with('steam')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        dd($user);
        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        auth()->login($authUser, true);

        return redirect()->to('/home');


    }
}
