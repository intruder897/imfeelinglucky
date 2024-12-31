@can('play', App\Models\Page::class)
    <x-action-button
        id="play-game-button"
        variant="success"
        href="{{ $page->getPlayHref() }}"
    >
        {{ __('page.play') }}

        <x-slot:script>
            fetch('{{ $page->getPlayHref() }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);

                document.getElementById('game-score').textContent  = data.score;
                document.getElementById('game-result').textContent  = data.result;
                document.getElementById('game-prize').textContent  = data.prize;
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        </x-slot:script>
    </x-action-button>
@endcan
