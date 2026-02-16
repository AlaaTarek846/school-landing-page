@extends('layout.admin.master')

@section('title', 'جولة بالمدرسة')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            @include('layout.admin.partials.breadcrumb',['page' => 'جولة بالمدرسة'])

            <div class="app">
                <campus-tours />
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush
