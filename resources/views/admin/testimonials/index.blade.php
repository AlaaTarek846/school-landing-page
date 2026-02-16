@extends('layout.admin.master')

@section('title', 'اراء العملاء')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'اراء العملاء'])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <testimonials />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


