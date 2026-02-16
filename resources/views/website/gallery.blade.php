@extends('layout.website.master')

@section('title',__('website.gallery'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg11">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.gallery') }}</span>
                    <h2>{{ __('website.Amazing Photo Gallery') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Gallery Area -->
    <div class="gallery-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-two text-center">
                <span class="section-span-bg2">{{ __('website.gallery') }}</span>
                <h2 class="margin-auto">{{ __('website.our_project') }} <b class="section-color2"> {{ __('website.gallery') }}</b></h2>
            </div>

            <div class="gallery-view pt-45">
                <div class="row justify-content-center">
                    @foreach($galleries as $gallery)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-gallery">
                            <img src="{{ $gallery->media?->url }}" alt="Images">
                            <a href="{{ $gallery->media?->url }}" class="gallery-icon">
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->

    @include('components.home.newsletter')

@endsection
