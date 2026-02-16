@extends('layout.admin.master')
@section('title', __('global.Facilities'))

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            @include('layout.admin.partials.breadcrumb',['page' => __('global.Facilities')])

            <div class="app">
                <facilities></facilities>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
