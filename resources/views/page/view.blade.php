@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Page') }}</div>
                    <div class="card-body">
                        @if($page->expired)
                            @include('home.components.page_expired_block')
                        @else
                            @include('page.components.page_controls')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('page.components.game')
    @include('page.components.history')
@endsection
