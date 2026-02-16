@extends('layout.admin.master')

@section('title', 'مراحل التعليم')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            @include('layout.admin.partials.breadcrumb',['page' => 'مراحل التعليم'])

            <div class="app">
                <educational-stages />
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
