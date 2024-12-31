<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PagePolicy
{
    public function view(?User $user): Response
    {
        return Response::allow();
    }

    public function generate(?User $user): Response
    {
        return Response::allow();
    }

    public function play(?User $user): Response
    {
        return Response::allow();
    }

    public function updateKey(User $user, Page $page): Response
    {
        return $user->is($page->user) ?
            Response::allow():
            Response::denyAsNotFound();
    }

    public function activate(User $user, Page $page): Response
    {
        return $user->is($page->user) ?
            Response::allow():
            Response::denyAsNotFound();
    }

    public function deactivate(User $user, Page $page): Response
    {
        return $user->is($page->user) ?
            Response::allow():
            Response::denyAsNotFound();
    }

    public function viewHistory(User $user, Page $page): Response
    {
        return $user->is($page->user) ?
            Response::allow():
            Response::denyAsNotFound();
    }
}
