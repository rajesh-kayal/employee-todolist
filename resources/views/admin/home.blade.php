@extends('layouts.app')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->is_admin == 1)
                        <p>{{ __('Admin, you are logged in!') }}</p>
                    @elseif(auth()->user()->is_admin === null)
                        <p>{{ __('Welcome, user!') }}</p>
                    @else
                        <p>{{ __('You are logged in!') }}</p>
                    @endif

                    <!-- Add a button to enter today's application -->
                    <a href="{{ route('users') }}" class="btn btn-primary">{{ __('Enter Today\'s Application') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
