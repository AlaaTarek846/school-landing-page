@extends('layout.admin.master')

@section('title', 'لماذا تختارنا')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            @include('layout.admin.partials.breadcrumb',['page' => 'لماذا تختارنا'])

            <div class="app">
                <why-choose-us />
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
