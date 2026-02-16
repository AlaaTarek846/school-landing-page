@extends('layout.admin.auth-master')

@section('title', __('translation.sign_in'))

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-end">
        <div class="col-1">
            @include('layout.admin.partials.header-language')
        </div>
    </div>
    <div class="app">
        <login />
    </div>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
