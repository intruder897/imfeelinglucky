@if($page->live)
    <div class="container my-3" id="history">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('page.history') }}</div>
                    <div class="card-body">
                        @include('page.components.buttons.refresh_history_button')
                        <table class="table" >
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Score</th>
                                <th scope="col">Result</th>
                                <th scope="col">Prize</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($history as $historyItem)
                                <tr>
                                    <th scope="row">{{ $historyItem->id }}</th>
                                    <td>{{ $historyItem->score }}</td>
                                    <td>{{ $historyItem->result }}</td>
                                    <td>{{ $historyItem->prize }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
