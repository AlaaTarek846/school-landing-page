@extends('layout.admin.master')
@section('title', __('global.CampusTourCategories'))

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            @include('layout.admin.partials.breadcrumb',['page' => __('global.CampusTourCategories')])

            <div class="app">
                <campus-tour-categories-component></campus-tour-categories-component>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
