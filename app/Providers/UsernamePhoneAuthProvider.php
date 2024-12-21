<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

class UsernamePhoneAuthProvider implements UserProvider
{

    public function retrieveById($identifier)
    {
        return User::find($identifier);
    }

    public function retrieveByToken($identifier, #[\SensitiveParameter] $token)
    {

    }

    public function updateRememberToken(Authenticatable $user, #[\SensitiveParameter] $token)
    {

    }

    public function retrieveByCredentials(#[\SensitiveParameter] array $credentials)
    {
        if (empty($credentials['username'])) {
            return null;
        }

        if (empty($credentials['phone'])) {
            return null;
        }

        return User::query()
            ->where('username', $credentials['username'])
            ->where('phone', $credentials['phone'])
            ->first();
    }

    public function validateCredentials(Authenticatable $user, #[\SensitiveParameter] array $credentials)
    {
        return $user->username === $credentials['username'] && $user->phone === $credentials['phone'];
    }

    public function rehashPasswordIfRequired(Authenticatable $user, #[\SensitiveParameter] array $credentials, bool $force = false)
    {

    }
}
