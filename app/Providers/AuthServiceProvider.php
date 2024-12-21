<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(): void
    {
        // Register the custom username and phone provider
        Auth::provider('username_phone', function ($app, array $config) {
            return new UsernamePhoneAuthProvider();
        });
    }
}
