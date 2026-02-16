@extends('layout.admin.master')
@section('title', __('global.FacilityDetails'))

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            @include('layout.admin.partials.breadcrumb',['page' => __('global.FacilityDetails')])

            <div class="app">
                <facility-details></facility-details>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
