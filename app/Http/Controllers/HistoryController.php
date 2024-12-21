<?php

namespace App\Http\Controllers;

use App\Models\Page;

class HistoryController extends Controller
{
    public function __invoke(Page $page): string
    {
        abort_if(!$page->live, 422);

        $history = $page->history()
            ->latest()
            ->limit(3)
            ->get();

        return view()->make('page.components.history', compact('page', 'history'))->render();
    }
}
