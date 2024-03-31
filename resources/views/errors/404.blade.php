@extends('layouts.app')

@section('title')
    404
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('errors.404.header') }}</div>

                    <div class="card-body">
                        <h2 class="text-center">{{ __('errors.404.title') }}</h2>
                        <p class="text-center">{{ __('errors.404.message') }}</p>
                        <div class="text-center mt-4">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
