@extends('layout.website.master')

@section('title',__('website.our_project'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg5">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.PROPERTY') }}</span>
                    <h2>{{ __('website.PROPERTY') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- House Area Two -->
    <div class="house-area-two pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($propertyTypes as $propertyType)
                <div class="col-lg-6 col-md-6">
                    <div class="house-card">
                        <a href="{{ $propertyType->id == 1 ? route('apartments-resail') : route('areas') }}">
                            <img src="{{ $propertyType->media?->url }}" onerror='src="{{asset('website/img/house/1.jpg')}}"' alt="Images">
                        </a>
                        <div class="content">
                            <span>{{ $propertyType->title }}</span>
                            <a href="{{ $propertyType->id == 1 ? route('apartments-resail') : route('areas') }}">
                                <h3>{{ $propertyType->title }}</h3>
                            </a>
                            <p>
                                {!! $propertyType->description !!}
                            </p>
                            <a
                                href="{{ $propertyType->id == 1 ? route('apartments-resail') : route('areas') }}"
                                class="default-btn default-hot-toddy"
                            >
                                {{ $propertyType->id == 1 ? __('website.apartments') : __('website.areas') }}
                                @if(app()->getLocale() == 'en')
                                    <i class='bx bx-right-arrow-alt'></i>
                                @else
                                    <i class='bx bx-left-arrow-alt'></i>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- House Area Two End -->

@endsection