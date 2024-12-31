<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\HistoryService;

class HistoryController extends Controller
{
    public function __invoke(Page $page, HistoryService $historyService): string
    {
        abort_if(!$page->live, 422);

        return view()->make('page.components.history', compact('page', 'historyService'))->render();
    }
}
