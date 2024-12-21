<x-action-button
    id="refresh-history-button"
    variant="success"
    href="{{ $page->getHistoryHref() }}"
>
    {{ __('page.refresh_history') }}

    <x-slot:script>
        fetch('{{ $page->getHistoryHref() }}', {
            method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        )
        .then(response => response.text())
        .then(html => {
            console.log('Success:', html);

            const tmpEl = document.createElement('div');
            tmpEl.innerHTML = html;

            const table = tmpEl.querySelector('table');

            if (table) {
                const targetEl = document.querySelector('#history .card-body');
                const tableEl = targetEl.querySelector('table');

                targetEl.replaceChild(table, tableEl);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    </x-slot:script>
</x-action-button>
