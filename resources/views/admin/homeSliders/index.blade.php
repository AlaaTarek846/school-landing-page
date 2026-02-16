@extends('layout.admin.master')

@section('title', 'السكشن المتحرك')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'السكشن المتحرك'])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <home-slider />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


