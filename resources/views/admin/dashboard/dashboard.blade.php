@extends('layout.admin.master')

@section('title', __('translation.main'))

{{--@section('css')--}}

{{--@endsection --}}
@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            @include('layout.admin.partials.breadcrumb',['page' => __('translation.main')])
            <!-- Page Header Close -->

            <!-- Start::row-1 -->
            <div class="app">
                <dashboard />
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
    <script src="{{ asset('assets/js/crm-dashboard.js') }}"></script>
@endpush


