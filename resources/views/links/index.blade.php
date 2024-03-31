@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>{{ config('app.name') }}</h2>

        @include('links._alert.success')
        @include('links._form')
    </div>

    <div class="container mt-5">
        <h1>Links</h1>

        @include('links._table')
    </div>
@endsection
