@if($page->live)
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('page.game') }}</div>
                    <div class="card-body">
                        @include('page.components.buttons.imfeelinglucky_button')

                        <div class="my-2">
                            <span>
                                <b>Score:</b> <span id="game-score">-</span>
                            </span>

                            <span>
                                <b>Result:</b> <span id="game-result">-</span>
                            </span>

                            <span>
                                <b>Prize:</b> <span id="game-prize">-</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
