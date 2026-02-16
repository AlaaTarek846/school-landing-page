@extends('layout.website.master')

@section('title',__('website.services'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg4">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.Service Details') }}</span>
                    <h2>{{ app()->getLocale() == 'en' ? $service->title_en :$service->title_ar }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{ app()->getLocale() == 'en' ? $service->title_en :$service->title_ar }}</b></h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="service-details-content">
                        <img src="{{ $service->image?->url }}" alt="Images">
                        {!! app()->getLocale() == 'en' ? $service->description_en :$service->description_ar !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

    @include('components.home.newsletter')

@endsection