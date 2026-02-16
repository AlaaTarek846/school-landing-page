@extends('layout.admin.master')

@section('title', 'طلبات التسجيل')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            @include('layout.admin.partials.breadcrumb',['page' => 'طلبات التسجيل'])

            <div class="app">
                <student-registrations />
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
