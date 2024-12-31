@can('deactivate', $page)
    <x-action-button
        id="deactivate-page-button"
        variant="primary"
        href="{{ $page->getDeactivateHref() }}"
    >
        {{ __('page.deactivate') }}

        <x-slot:script>
            fetch('{{ $page->getDeactivateHref() }}', {
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
@endcan
