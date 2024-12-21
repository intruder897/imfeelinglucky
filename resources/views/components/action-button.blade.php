
<a
    id="{{ $id }}"
    class="btn btn-{{ $variant }}"
    href="{{ $href }}"
    role="button"
>
    {{ $slot }}
</a>

@if(isset($script))
    <script>
        document.getElementById('{{ $id }}').addEventListener('click', function(event) {
            event.preventDefault();

            {!! $script !!}
        });
    </script>
@endif
