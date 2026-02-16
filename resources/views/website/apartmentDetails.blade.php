@extends('layout.website.master')

@section('title',__('website.appointment'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg12">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.property details') }}</span>
                    <h2>{{ $apartment->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- House Details Area -->
    <div class="house-details-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="house-content margin-left">
                        <span>{{ __('website.HOUSES') }}</span>
                        <h2>{{ __('website.Details You Need To Know') }}</h2>
                        <ul class="house-list">
                            <li>{{ __('website.PARKING') }}<b>{{ $apartment->parking }}</b></li>
                            <li>{{ __('website.BATHROOM') }}<b>{{ $apartment->bathroom }}</b></li>
                            <li>{{ __('website.BEDROOM') }}<b>{{ $apartment->bedroom }}</b></li>
                            <li>{{ __('website.LIVING ROOM') }}<b>{{ $apartment->living_room }}</b></li>
                            <li>{{ __('website.KITCHEN') }}<b>{{ $apartment->kitchen }}</b></li>
                            <li>{{ __('website.GARDEN') }}<b>{{ $apartment->garden }}</b></li>
                        </ul>
                        @if($apartment->pdf)
                        <a href="{{ $apartment->pdf?->url }}" download class="default-btn default-sante-fe">
                            {{ __('website.Download Brochure') }}
                            @if(app()->getLocale() == 'en')
                                <i class='bx bx-right-arrow-alt'></i>
                            @else
                                <i class='bx bx-left-arrow-alt'></i>
                            @endif
                        </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 p-0 m-0">
                    <div class="house-slider owl-carousel owl-theme">
                        @foreach($apartment->images as $image)
                        <div class="house-item">
                            <img src="{{ $image->url }}" alt="{{ $apartment->title }}">
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- House Details Area End -->

    <div class="container p-4 my-5 article-content">
        {!! $apartment->description !!}
    </div>

    <!-- Newsletter Area -->
    <div class="newsletter-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="newsletter-content">
                        <i class='flaticon-email'></i>
                        <h2>{{ __('website.Join our weekly') }} <b class="section-color">{{ __('website.Newsletter') }}</b></h2>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="newsletter-form-area">
                        <form class="newsletter-form" data-toggle="validator" method="POST" action="{{ route('contact.subscribe') }}">
                            @csrf
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required autocomplete="off">
                            <button class="default-btn default-hot-toddy" type="submit">
                                {{ __('website.Subscribe') }}
                                @if(app()->getLocale() == 'en')
                                    <i class='bx bx-right-arrow-alt'></i>
                                @else
                                    <i class='bx bx-left-arrow-alt'></i>
                                @endif
                            </button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Area End -->

@endsection