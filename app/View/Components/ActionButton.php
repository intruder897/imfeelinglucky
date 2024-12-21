<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public function __construct(
        public string $id,
        public string $variant,
        public string $href
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
