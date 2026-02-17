        <!-- START FOOTER -->
        <footer class="bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <a href="{{ route('home') }}"><img src="{{ asset('website/images/logo-light.png') }}" onerror="this.src='{{ asset('website/images/feature/img-02.png') }}'" alt="" height="22"></a>
                            <p class="text-white-50 mt-3 pt-2 mb-0 ">{{ __('website.school_footer_desc') }}</p>
                            <div class="mt-4">
                                <ul class="list-inline footer-social">
                                    @if($setting->facebook)
                                    <li class="list-inline-item">
                                        <a href="{{ $setting->facebook }}" target="_blank">
                                            <i class="mdi mdi-facebook"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($setting->twitter)
                                    <li class="list-inline-item">
                                        <a href="{{ $setting->twitter }}" target="_blank">
                                            <i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($setting->instagram)
                                    <li class="list-inline-item">
                                        <a href="{{ $setting->instagram }}" target="_blank">
                                            <i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($setting->linkedin)
                                    <li class="list-inline-item">
                                        <a href="{{ $setting->linkedin }}" target="_blank">
                                            <i class="mdi mdi-linkedin"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-2 col-md-6">
                        <div class="mt-4">
                            <h6 class="text-white text-uppercase fs-16">{{ __('website.Resources') }}</h6>
                            <ul class="list-unstyled footer-link mt-3 mb-0 p-0">
                                <li><a href="#home">{{ __('website.home') }}</a></li>
                                <li><a href="#service">{{ __('website.why_choose_us') }}</a></li>
                                <li><a href="#process">{{ __('website.Educational stages') }}</a></li>
                                <li><a href="#testimonial">{{ __('website.Testimonials') }}</a></li>
                                <li><a href="#portfolio">{{ __('website.our_works') }}</a></li>
                                <li><a href="#contact">{{ __('website.contact') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-2 col-md-6">
                        <div class="mt-4">
                            <h6 class="text-white text-uppercase fs-16">{{ __('website.policies') }}</h6>
                            <ul class="list-unstyled footer-link mt-3 mb-0 p-0">
                                <li><a href="{{ route('policy') }}">{{ __('website.Privacy Policy') }}</a></li>
                                <li><a href="{{ route('termCondition') }}">{{ __('website.Terms and Conditions') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4">
                        <div class="mt-4">
                            <h6 class="text-white text-uppercase fs-16">{{ __('website.contact') }}</h6>
                            <div class="mt-3 mb-0">
                                <div class="d-flex mb-2">
                                    <i class="mdi mdi-map-marker text-white-50"></i>
                                    <div class="flex-grow-1">
                                        <p class="text-white-50 ps-3">{!! $setting->address !!}</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="mdi mdi-phone text-white-50"></i>
                                    <div class="flex-grow-1">
                                        <p class="text-white-50 ps-3">{{ $setting->mobile }}</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="mdi mdi-email text-white-50"></i>
                                    <div class="flex-grow-1">
                                        <p class="text-white-50 ps-3">{{ $setting->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </footer>
        <!-- END FOOTER -->

        <!-- FOOTER-ALT -->
        <div class="footer-alt py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="text-white-50 mb-0">
                                {{__('website.footer_message')}} <a href="https://innovations-eg.com" target="_blank">Innovation</a>
                            </p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </div>
        <!-- END FOOTER-ALT -->

        <!--start back-to-top-->
        <button onclick="topFunction()" id="back-to-top">
            <i class="mdi mdi-arrow-up-bold"></i>
        </button>
        <!--end back-to-top-->
