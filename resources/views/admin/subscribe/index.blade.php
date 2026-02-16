@extends('layout.admin.master')

@section('title', ' المشتركين')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'المشتركين '])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <subscribes />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


