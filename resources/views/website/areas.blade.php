@extends('layout.website.master')

@section('title',__('website.about'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg9">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.companies') }}</span>
                    <h2>{{ __('website.companies') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Product Area -->
    <div class="product-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-two text-center">
                <h2 class="margin-auto color-title-blue">{{ __('website.companies') }}</h2>
            </div>
            <div class="row pt-45">
                @foreach($companies as $company)
                <div class="col-lg-4 col-sm-6">
                    <div class="single-product">
                        <img src="{{ $company->media?->url  }}"  onerror='src="{{asset('website/img/product/1.jpg')}}"' alt="Image">
                        <div class="product-content">
                            <a href="{{route('developments',$company->slug)}}">
                                <h3>{{ $company->title }}</h3>
                            </a>

                            <a href="{{route('developments',$company->slug)}}" class="default-btn default-bg-buttercup product-btn">
                                {{ $company->title }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    @include('components.home.newsletter')
@endsection