@extends('layout.website.master')

@section('title',__('website.about'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg6">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.about') }}</span>
                    <h2>{{ __('website.We Have A Goal To Achieve you') }} <br> {{ __('website.To Your Destination') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->



    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">{{ $oneAbout->title_color }}</span>
                            <h2>{{ $oneAbout->title }}</h2>
                            <p>
                                {{ $oneAbout->description }}
                            </p>
                        </div>
                        <div class="row justify-content-center">
                            @if ($oneAbout->details)
                                @foreach ($oneAbout->details as $detail)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="about-card">
                                        <h3>{{ $detail->title }}</h3>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset('website/img/about-img.jpg')}}" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="team-content">
                        <div class="section-title-two">
                            <span class="section-span-bg2">{{ __('website.TEAM MEMBERS') }}</span>
                            <h2>{{ __('website.We Are Pleased To') }} <b class="section-color2">{{ __('website.Meet You') }}</b></h2>
                            <a href="#" class="team-btn">
                                {{ __('website.Meet Our Team') }}
                                @if(app()->getLocale() == 'en')
                                    <i class='bx bx-right-arrow-alt'></i>
                                @else
                                    <i class='bx bx-left-arrow-alt'></i>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                @foreach($teams as $team)
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="team-card active">
                        <a href="{{route('team')}}">
                            <img src="{{ $team->media?->url }}" alt="{{ $team->name }}">
                        </a>
                        <div class="content">
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
    <!-- Team Area End -->

    @include('components.home.newsletter')
@endsection