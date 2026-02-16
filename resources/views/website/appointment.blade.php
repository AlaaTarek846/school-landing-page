@extends('layout.website.master')

@section('title',__('website.appointment'))

@section('content')
    <!--======== About Page Banner Start ========-->
    <section class="rs-page-banner" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rs-page-banner__content">
                        <h1 class="title">{{ __('website.Book an Appointment') }}</h1>
                        <ul>
                            <li><i class="ri-home-wifi-line"></i> <a href="{{ route('home') }}">{{ __('website.home') }}</a></li>
                            <li>
                                @if(app()->getLocale() == 'en')
                                    <i class="ri-arrow-left-fill"></i>
                                @else
                                    <i class="ri-arrow-right-fill"></i>
                                @endif
                                {{ __('website.appointment') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--======== About Page Banner Ends ========-->

   <!--======== Appointment Box Start ========-->
    <section class="rs-appointment-box pt-120" style="direction: ltr !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="rs-appointment-box__form">
                        <div class="{{ app()->getLocale() == 'en' ? 'rs-section-title' : '' }} pb-45" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
                            <h2 class="title split-in-fade">{{ __('website.Let’s Build Something Great Together') }}</h2>
                            <p>{{ __('website.Schedule a meeting to explore customized software solutions designed for your specific market challenges') }}</p>
                        </div>
                        <form id="contact-form" action="{{ route('appointment.store') }}" method="post">
                            @csrf
                            <div class="row" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="text" id="name" name="name" placeholder="{{ __('website.Your Name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="email" id="email" name="email" placeholder="{{ __('website.Your Email') }}">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="text" id="topic" name="topic" placeholder="{{ __('website.Your Topic') }}">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <input type="text" id="phone" name="phone" placeholder="{{ __('website.Your Phone') }}">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <textarea name="message" id="message" placeholder="{{ __('website.Message') }}" ></textarea>
                                       
                                        <button type="submit" class="main-btn">{{ __('website.Send Message') }} <i class="ri-arrow-right-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p id="form-messages" class="form-message" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rs-thumb">
            <img src="{{ asset('website/images/appoinment/team_image_large.png') }}" alt="">
        </div>
    </section>
    <!--======== Appointment Box Ends ========-->
@endsection