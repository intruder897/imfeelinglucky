<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Traits\AuthenticateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use AuthenticateUser;

    /**
     * @throws ValidationException
     */
    public function auth(Request $request): RedirectResponse
    {
        $this->validateCredentials($request);

        if ($this->authAttempt($request)) {
            return redirect()->to('/home');
        }

        $this->checkIfUserExist($request);

        $user = $this->createUserAndPage($request);

        Auth::login($user);

        return redirect()->to('/home');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
