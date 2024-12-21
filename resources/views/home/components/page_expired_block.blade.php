<div class="alert alert-danger" role="alert">
    {{ __('page.expired_message') }}
</div>

<a class="btn btn-primary" href="{{ App\Models\Page::getGenerateHref() }}"
   role="button"
   onclick="event.preventDefault();document.getElementById('deactivate-page-form').submit();"
>
    {{ __('page.make_new') }}
</a>

<form id="deactivate-page-form" action="{{ App\Models\Page::getGenerateHref() }}" method="POST" class="d-none">
    @csrf
</form>
