@can('updateKey', $page)
    <x-action-button
        id="regenerate-page-button"
        variant="danger"
        href="{{ $page->getUpdateKeyHref() }}"
    >
        {{ __('page.regenerate') }}

        <x-slot:script>
            fetch('{{ $page->getUpdateKeyHref() }}', {
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
@endcan
