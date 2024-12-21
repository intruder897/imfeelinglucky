<?php

namespace App\Http\Controllers\Auth\Traits;

use App\Models\Page;
use App\Models\User;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

trait AuthenticateUser
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    protected function validateCredentials(Request $request): void
    {
        $request->validate([
            'username' => 'required|string|alpha_num|min:3',
            'phone' => 'required|string|min_digits:9',
        ]);
    }

    protected function authAttempt(Request $request): bool
    {
        return Auth::guard()->attempt($this->credentials($request));
    }

    protected function credentials(Request $request): array
    {
        return $request->only('username', 'phone');
    }

    /**
     * @throws ValidationException
     */
    protected function checkIfUserExist(Request $request): void
    {
        $credentials = $this->credentials($request);

        $user = User::query()
            ->where('phone', $credentials['phone'])
            ->first();

        if ($user && $user->username !== $credentials['username']) {
            throw ValidationException::withMessages([
                'phone' => __('auth.phone_exist_error_message'),
            ]);
        }
    }

    /**
     * @throws ValidationException
     */
    protected function createUserAndPage(Request $request) {
        $credentials = $this->credentials($request);

        DB::beginTransaction();

        try {
            $user = User::query()
                ->create($credentials);

            /** @var PageService $pageService */
            $pageService = resolve('App\Services\PageService');
            $pageService->generatePage(forUser: $user);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw ValidationException::withMessages([
                'username' => __('auth.general_error_message'),
            ]);
        }

        return $user;
    }

}
