<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class LoginWithController extends Controller
{

    public array $providers = [
        'google',
        'microsoft'
    ];


    public function redirect(string $provider)
    {
        abort_unless(in_array($provider, $this->providers), 403);

        return Socialite::driver($provider)->redirect();
    }


    /**
     * Update the user's password.
     */
    public function callback(string $provider, Request $request): RedirectResponse
    {
        abort_unless(in_array($provider, $this->providers), 403);

        $providerUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            $provider . '_id' => $providerUser->id,
        ], [
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            $provider . '_token' => $providerUser->token,
            $provider . '_refresh_token' => $providerUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
