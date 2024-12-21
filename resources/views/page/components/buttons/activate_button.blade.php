<x-action-button
    id="activate-page-button"
    variant="primary"
    href="{{ $page->getActivateHref() }}"
>
    {{ __('page.activate') }}

    <x-slot:script>
        fetch('{{ $page->getActivateHref() }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(() => {
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    </x-slot:script>
</x-action-button>
