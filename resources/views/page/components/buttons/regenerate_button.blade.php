<x-action-button
    id="regenerate-page-button"
    variant="danger"
    href="{{ $page->getGenerateHref() }}"
>
    {{ __('page.regenerate') }}

    <x-slot:script>
        fetch('{{ $page->getGenerateHref() }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    </x-slot:script>
</x-action-button>
