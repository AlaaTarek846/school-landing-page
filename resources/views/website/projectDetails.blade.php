@extends('layout.website.master')

@section('title',__('website.Products'))

@section('content')
    <div class="stricky-header stricked-menu main-menu main-menu-four ">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->



    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url(/website/images/backgrounds/page-header-bg.jpg);">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>{{ $project->title }}</h2>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{route('home')}}">{{ __('website.home') }}</a></li>
                        <li>
                            @if(app()->getLocale() == 'en')
                                <span class="icon-arrow-left"></span>
                            @else
                                <span class="icon-arrow-right"></span>
                            @endif
                        </li>
                        <li><a href="{{route('project')}}">{{ __('website.Products') }}</a></li>
                        <li>
                            @if(app()->getLocale() == 'en')
                                <span class="icon-arrow-left"></span>
                            @else
                                <span class="icon-arrow-right"></span>
                            @endif
                        </li>
                        <li>{{ $project->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Project Details Start-->
    <section class="project-details">
        <div class="container">
            <div class="project-details__img-1">
                <img {{ $project->media?->url }} alt="{{ $project->title }}">
                <div class="project-details__info">
                    <h3 class="project-details__info-title">{{__('website.Product')}}</h3>
                    <div class="project-details__info-and-ratting">
                        <ul class="project-details__info-list list-unstyled">
                            <li>
                                <p>{{__('website.Name')}}:<span>{{ $project->title }}</span></p>
                            </li>
                            <li>
                                <p>{{__('website.Date')}}:<span>{{ $project->created_at?->toFormattedDateString() }}</span></p>
                            </li>
                            <li>
                                <p>{{__('website.Tags')}}:<span>{{ $project->tag }}</span></p>
                            </li>
                            <li>
                                <p>{{__('website.Value')}}:<span>{{ $project->cost }}</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <h3 class="project-details__title-1">{{ __('website.Product overview') }}</h3>
                <p class="project-details__text-1">
                    {!! $project->description !!}
                </p>
                <div class="project-details__pagination">
                    <ul class="pg-pagination list-unstyled">
                        <li class="prev">
                            @if($previousProject)
                            <a href="{{ route('project-details', ['slug' => $previousProject->slug]) }}" aria-label="prev">
                                @if(app()->getLocale() == 'en')
                                    <span class="icon-arrow-right"></span>
                                @else
                                    <span class="icon-arrow-left"></span>
                                @endif
                                {{ __('website.Prev Post') }}
                            </a>
                            @endif
                        </li>
                        <li class="next">
                            @if($nextProject)
                            <a href="{{ route('project-details', ['slug' => $nextProject->slug]) }}" aria-label="Next">
                                {{ __('website.Next Post') }}
                                @if(app()->getLocale() == 'en')
                                    <span class="icon-arrow-left"></span>
                                @else
                                    <span class="icon-arrow-right"></span>
                                @endif
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Project Details End-->



    <!--CTA Two Start-->
    <section class="cta-two">
        <div class="cta-two__img-1" style="background-image: url(website/images/resources/cta-two-img-1.jpg);"></div>
        <div class="cta-two__shape-1 float-bob-x">
            <img src="{{ asset('website/images/shapes/cta-two-shape-1.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4"></div>
                <div class="col-xl-6 col-lg-8">
                    <div class="cta-two__right">
                        <h3 class="cta-two__title">{{ __('website.Subscribe to our newsletter') }}</h3>
                        <p class="cta-two__text">
                            {{ __('website.Register now to get latest updates on promotions & coupons') }}
                        </p>
                        <form method="post" action="{{ route('contact.subscribe') }}">
                            @csrf
                            <div class="cta-two__contact-input-box">
                                <input type="email" placeholder="{{ __('website.Enter Your Email') }}" required name="email">
                                <button type="submit" class="cta-two__contact-btn thm-btn">{{ __('website.Subscribe') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA Two End-->


@endsection