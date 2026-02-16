@extends('layout.website.master')

@section('title',__('website.services'))

@section('content')


    <!-- Inner Banner -->
    <div class="inner-banner inner-bg5">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.services') }}</span>
                    <h2>{{ __('website.Our All Services') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Apartment Offer two -->
    <div class="apartment-offer-two pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="offer-content">
                        <div class="section-title-two">
                            <span class="section-span-white">{{ __('website.services') }}</span>
                            <h2 class="section-white">{{ __('website.Our All Facilities &') }} <b >{{ __('website.services') }}</b> </h2>
                        </div>
                    </div>
                </div>
                @foreach ($services as $service)
                <div class="col-lg-3 col-sm-6">
                    <a href="{{route('service-details',$service->slug)}}">
                        <div class="offer-item offer-item-bg2 active">
                            <h3>{{ app()->getLocale() == 'en' ? $service->title_en :$service->title_ar }}</h3>
                            <p>{!! app()->getLocale() == 'en' ? $service->quote_en :$service->quote_ar !!}</p>
                            <i class="flaticon-bankrupt"></i>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Apartment Offer Area End -->

    @include('components.home.newsletter')
@endsection