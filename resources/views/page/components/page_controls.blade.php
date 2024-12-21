<a href="{{ $page->getHref() }}">{{ $page->getHref() }}</a>

@include('page.components.buttons.regenerate_button')

@switch($page->is_active)
    @case(true)
        @include('page.components.buttons.deactivate_button')
        @break

    @case(false)
        @include('page.components.buttons.activate_button')
        @break
@endswitch
