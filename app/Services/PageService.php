<?php

namespace App\Services;

use App\Models\Page;
use App\Models\User;

class PageService
{
    public function generatePage(User $forUser): Page {
        $forUser->page()->delete();

        return $forUser->page()->create([
            'is_active' => true,
            'expires_at' => today()->addDays(Page::DAYS_AMOUNT_LINK_VALID),
        ]);
    }

    public function activatePage(Page $page): void {
        $page->is_active = true;
        $page->save();
    }

    public function deactivatePage(Page $page): void {
        $page->is_active = false;
        $page->save();
    }
}
