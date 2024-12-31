<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Services\HistoryService;
use App\Services\PageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function page(Page $page, HistoryService $historyService): Renderable {
        Gate::authorize('view', Page::class);

        return view('page.view', compact('page', 'historyService'));
    }

    public function updateKey(Page $page, PageService $pageService): RedirectResponse
    {
        Gate::authorize('updateKey', $page);

        $pageService->updateKey($page);

        return redirect()->to($page->getHref());
    }

    public function activate(Page $page, PageService $pageService): RedirectResponse
    {
        Gate::authorize('activate', $page);

        $pageService->activatePage($page);

        return redirect()->to($page->getHref());
    }

    public function deactivate(Page $page, PageService $pageService): RedirectResponse
    {
        Gate::authorize('deactivate', $page);

        $pageService->deactivatePage($page);

        return redirect()->to($page->getHref());
    }
}
