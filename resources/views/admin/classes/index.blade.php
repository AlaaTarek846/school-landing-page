@extends('layout.admin.master')

@section('title', 'الصفوف الدراسية')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            @include('layout.admin.partials.breadcrumb',['page' => 'الصفوف الدراسية'])

            <div class="app">
                <class-rooms />
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
