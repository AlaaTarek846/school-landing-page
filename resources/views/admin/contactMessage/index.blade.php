@extends('layout.admin.master')

@section('title', ' رسائل التواصل')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'رسائل التواصل '])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <contact-messages />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


