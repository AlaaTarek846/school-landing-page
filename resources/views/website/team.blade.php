@extends('layout.website.master')

@section('title',__('website.team'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg11">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.team') }}</span>
                    <h2>{{ __('website.We are Pleased To Meet You') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Team Area Two -->
    <div class="team-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title-two text-center">
                <span class="section-span-bg2">{{ __('website.TEAM MEMBERS') }}</span>
                <h2>{{ __('website.Our Expert') }} <b class="section-color2">{{ __('website.Team Members') }}</b></h2>
            </div>
            <div class="row pt-45">
                @foreach($teams as $team)
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="team-card active">
                        <a href="{{route('team')}}">
                            <img src="{{ $team->media?->url }}" alt="{{ $team->name }}">
                        </a>
                        <div class="content box-shadow">
                            <a href="{{route('team')}}">
                                <h3>{{ $team->name }}</h3>
                                <span>{{ $team->job }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team Area Two End -->

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