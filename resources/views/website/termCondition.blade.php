@extends('layout.website.master')

@section('title', __('website.Terms and Conditions'))

@section('content')
<style>
    .inner-banner {
        padding: 150px 0 100px;
        background-color: #192b33;
        position: relative;
        overflow: hidden;
    }
    .inner-banner .bg-overlay-pattern {
        background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='250' preserveAspectRatio='none' viewBox='0 0 1440 250'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1062%26quot%3b)' fill='none'%3e%3cpath d='M30 250L280 0L451 0L201 250z' fill='url(%23SvgjsLinearGradient1063)'%3e%3c/path%3e%3cpath d='M276.6 250L526.6 0L735.1 0L485.1 250z' fill='url(%23SvgjsLinearGradient1063)'%3e%3c/path%3e%3cpath d='M485.20000000000005 250L735.2 0L1075.7 0L825.7 250z' fill='url(%23SvgjsLinearGradient1063)'%3e%3c/path%3e%3cpath d='M721.8000000000001 250L971.8000000000001 0L1271.8000000000002 0L1021.8000000000001 250z' fill='url(%23SvgjsLinearGradient1063)'%3e%3c/path%3e%3cpath d='M1434 250L1184 0L872 0L1122 250z' fill='url(%23SvgjsLinearGradient1064)'%3e%3c/path%3e%3cpath d='M1155.4 250L905.4000000000001 0L855.9000000000001 0L1105.9 250z' fill='url(%23SvgjsLinearGradient1064)'%3e%3c/path%3e%3cpath d='M921.8 250L671.8 0L352.29999999999995 0L602.3 250z' fill='url(%23SvgjsLinearGradient1064)'%3e%3c/path%3e%3cpath d='M717.1999999999999 250L467.19999999999993 0L209.19999999999993 0L459.19999999999993 250z' fill='url(%23SvgjsLinearGradient1064)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1062'%3e%3crect width='1440' height='250' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='100%25' y2='0%25' id='SvgjsLinearGradient1063'%3e%3cstop stop-color='rgba(5%2c 189%2c 147%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(5%2c 189%2c 147%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='100%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1064'%3e%3cstop stop-color='rgba(5%2c 189%2c 147%2c 0.2)' offset='0'%3e%3c/stop%3e%3cstop stop-opacity='0' stop-color='rgba(5%2c 189%2c 147%2c 0.2)' offset='0.66'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e");
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        opacity: 0.4;
    }
    .inner-title h2 {
        font-size: 42px;
        letter-spacing: 1px;
        animation: fadeInUp 0.8s ease-out;
    }
    .inner-title span {
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2px;
        animation: fadeInUp 1s ease-out;
    }
    .policy-content-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 50px;
        margin-top: -60px;
        position: relative;
        z-index: 2;
        animation: slideInUp 0.8s ease-out;
    }
    .policy-text {
        color: #4a5568;
        line-height: 1.8;
        font-size: 16px;
    }
    .policy-text h3, .policy-text h4 {
        color: #1a202c;
        margin-top: 30px;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    .policy-text h3::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 40px;
        height: 3px;
        background: #05bd93;
        border-radius: 2px;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    body[dir="rtl"] .policy-text h3::after {
        left: auto;
        right: 0;
    }
</style>

    <!-- Inner Banner -->
    <section class="inner-banner">
        <div class="bg-overlay-pattern"></div>
        <div class="container">
            <div class="inner-title text-center">
                <h2 class="text-white">{{ __('website.Terms and Conditions') }}</h2>
                <span class="text-white-50">{{ __('website.home') }} / {{ __('website.Terms and Conditions') }}</span>
            </div>
        </div>
    </section>
    <!-- Inner Banner End -->

    <!-- Terms & Conditions Area -->
    <section class="terms-conditions-area pb-5">
        <div class="container">
            <div class="policy-content-card">
                <div class="policy-text">
                    @if($term)
                        {!! $term->description !!}
                    @else
                        <div class="text-center py-5">
                            <i class="mdi mdi-information-outline fs-1 text-muted"></i>
                            <p class="mt-3">{{ __('website.content_not_available') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Terms & Conditions Area End -->

@endsection