<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(Request $request, PageService $pageService): Renderable
    {
        return view('home/home');
    }
}
