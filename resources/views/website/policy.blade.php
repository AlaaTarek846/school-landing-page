@extends('layout.website.master')

@section('title',__('website.Privacy Policy'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.Privacy Policy') }}</span>
                    <h2>{{ __('website.Privacy Policy') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Privacy Policy Area -->
    <div class="privacy-policy-area pt-100 pb-70">
        <div class="container">
            <div class="single-content">
                {!! $policy->description !!}
            </div>
        </div>
    </div>
    <!-- Privacy Policy Area End -->

    @include('components.home.newsletter')

@endsection