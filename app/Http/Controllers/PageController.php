<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Services\HistoryService;
use App\Services\PageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(): Renderable
    {
        return view('home');
    }

    public function page(Page $page, HistoryService $historyService): Renderable {

        return view('page.view', ['page' => $page, 'history' => $historyService->getHistory($page)]);
    }

    public function generate(PageService $pageService): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $page = $pageService->generatePage($user);

        return redirect()->to($page->getHref());
    }

    public function activate(Page $page, PageService $pageService): RedirectResponse
    {
        $pageService->activatePage($page);

        return redirect()->to($page->getHref());
    }

    public function deactivate(Page $page, PageService $pageService): RedirectResponse
    {
        $pageService->deactivatePage($page);

        return redirect()->to($page->getHref());
    }
}
