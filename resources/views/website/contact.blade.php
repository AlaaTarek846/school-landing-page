@extends('layout.website.master')

@section('title',__('website.contact'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.Contact Us') }}</span>
                    <h2>{{ __('website.We’re Always Helpful') }} <br> {{ __('website.To Lend A Hand') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Service Area Four -->
    <div class="service-area-four pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($services as $service)
                <div class="col-lg-3 col-sm-6">
                    <div class="service-card service-card-bg-three section-bg">
                        <a href="{{route('service-details',$service->slug)}}">
                            <h3>{{ app()->getLocale() == 'en' ? $service->title_en :$service->title_ar }}</h3>
                        </a>
                        <p class="text-break">{!! app()->getLocale() == 'en' ? $service->quote_en :$service->quote_ar !!}</p>
                        <a href="{{route('service-details',$service->slug)}}" class="learn-more-btn">
                            {{ __('website.Read More') }}
                            @if(app()->getLocale() == 'en')
                                <i class='bx bx-right-arrow-alt'></i>
                            @else
                                <span class="bx bx-left-arrow-alt"></span>
                            @endif
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service Area Four End -->

    <!-- Map Area Two -->
    <div class="map-area-two">
        <div class="container-fluid m-0 p-0">
            {!! $setting->map !!}
            <div class="contact-wrap">
                <div class="contact-form">
                    <span>{{__('website.Send message')}}</span>
                    <h2>{{__('website.Contact With Us')}}</h2>
                    <form id="contactForm" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="text" name="name" placeholder="{{ __('website.Your Name') }}" required id="name" class="form-control" data-error="{{ __('website.Please enter your name') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-user'></i>
                                    <input type="email" name="email" id="email" class="form-control" required data-error="{{ __('website.Please enter your email') }}" placeholder="{{ __('website.Your Email') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-phone'></i>
                                    <input type="text" name="phone" id="phone_number" required data-error="{{ __('website.Please enter your number') }}" class="form-control" placeholder="{{ __('website.Your Phone') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <i class='bx bx-file'></i>
                                    <input type="text" name="topic" id="msg_subject" class="form-control" required data-error="{{ __('website.Please enter your subject') }}" placeholder="{{ __('website.Your Topic') }}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <i class='bx bx-envelope'></i>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="{{ __('website.Write your message') }}" placeholder="{{ __('website.Message') }}"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn default-hot-toddy">
                                    {{ __('website.Send Message') }}
                                    @if(app()->getLocale() == 'en')
                                        <i class='bx bx-right-arrow-alt'></i>
                                    @else
                                        <span class="bx bx-left-arrow-alt"></span>
                                    @endif
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Area Two End -->

    @include('components.home.newsletter')
@endsection