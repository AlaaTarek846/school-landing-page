@extends('layout.admin.master')

@section('title', 'صفحة من نحن')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'صفحة من نحن'])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <one-about />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


