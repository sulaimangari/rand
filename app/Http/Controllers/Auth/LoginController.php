<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function redirectToProvider()
    {
        return Socialite::with('azure')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $azureuser = Socialite::driver('azure')->user();

        dd($azureuser);

        // $user = User::create([
        //     'provider_id' => $azureuser->getId(),
        //     'name' => $azureuser->getName(),
        //     'email' => $azureuser->getEmail(),
        //     'avatar' => $azureuser->getAvatar(),
        // ]);

        // Auth::Login($user, true);

        // return redirect()->route('homeUser');
    }

    use AuthenticatesUsers;

    public function authenticated($request, $user)
    {

        if ($request->user()->hasRole(['admin'])) {
            return redirect()->route('home');
        }
        if ($request->user()->hasRole(['crew'])) {
            return redirect()->route('homeUser');
        }
    }
}
