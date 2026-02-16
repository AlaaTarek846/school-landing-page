@extends('layout.website.master')

@section('title',__('website.Faq'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg1">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.Faq') }}</span>
                    <h2>{{ __('website.Faq') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Faq Are -->
    <div class="faq-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-two text-center">
                <span class="section-span-bg2">{{ __('website.Faq') }}</span>
                <h2 class="margin-auto">{{ __('website.Asked') }} <b class="section-color2">{{ __('website.Questions') }}</b></h2>
            </div>
            <div class="row pt-45">
                @foreach($faqs as $faq)
                <div class="col-lg-6">
                    <div class="faq-item">
                        <h3>{{ $faq->title }}</h3>
                        <p>
                            <strong>{{ app()->getLocale() == 'en' ? 'A' : 'ج' }}:</strong>
                            {{ $faq->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Faq Are End -->

    @include('components.home.newsletter')
@endsection