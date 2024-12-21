@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('page.title') }}</div>
                    <div class="card-body">
                        @if(empty(auth()->user()?->page) || auth()->user()?->page->expired)
                            @include('home.components.page_expired_block', ['page' => auth()->user()?->page])
                        @else
                            @include('home.components.page_block', ['page' => auth()->user()?->page])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
