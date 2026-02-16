@extends('layout.admin.master')

@section('title', 'السكشن الثاني')

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => 'السكشن الثاني'])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <two-about />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush


