@extends('layout.admin.master')

@section('title', ' الأسئلة الشائعة')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => ' الأسئلة الشائعة'])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <faq />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


