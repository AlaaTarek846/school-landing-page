@extends('layout.website.master')

@section('title',__('website.appointment'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg8">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.project') }}</span>
                    <h2>{{  isset($project) ? $project->title : __('website.Our Some Ongoing and Completed Project') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Property Section Two -->
    <section class="property-section-two pt-100 pb-70">
        <div class="container-fluid">
            <div class="container-max">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="cart-wraps-area">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="cart-calc">
                                        <div class="cart-wraps-form">
                                            <form action="{{ isset($project) ? route('apartments',$project->slug) : route('apartments-resail') }}" method="GET">
                                                <div class="form-group">
                                                    <select name="area_id">
                                                        <option {{ !request()->area_id ? 'selected' : '' }} disabled>---</option>
                                                        @foreach($areas as $area)
                                                            <option {{ request()->area_id == $area->id ? 'selected' : '' }} value="{{ $area->id }}">{{ $area->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ request()->search }}" name="search" placeholder="{{ __('website.Searching') }}">
                                                </div>
                                                <button type="submit" class="default-btn default-hot-toddy">
                                                    {{ __('website.filter') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="property-section-title-two">
                            <div class="section-title-two text-center">
                                <h2>
                                    {{ __('website.Our Some Ongoing and Completed Project') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-45">
                    @foreach($apartments as $apartment)
                    <div class="col-lg-4 col-md-6">
                        <div class="property-card">
                            <a href="{{route('apartment-details',$apartment->slug)}}">
                                <img
                                    src="{{ $apartment->photo?->url }}"
                                    onerror='src="{{{asset('website/img/property/pr-1.jpg')}}}"'
                                    alt="Images"
                                >
                            </a>
                            <div class="content">
                                <span>{{ __('website.DEVELOPED') }}</span>
                                <a href="{{route('apartment-details',$apartment->slug)}}">
                                    <h3>{{ $apartment->title }}</h3>
                                </a>
                                <p>{!! $apartment->description !!}</p>
                                <a href="{{route('apartment-details',$apartment->slug)}}" class="learn-more-btn">
                                    {{ __('website.Learn More') }}
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
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area text-center">
                            {!! $apartments->appends(request()->query())->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Section Two End -->

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