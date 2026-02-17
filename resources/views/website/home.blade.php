@extends('layout.website.master')

@section('title', __('website.home'))

@section('content')

        <!-- START HOME -->
        <section class="bg-home5" id="home" style="background-image: url('{{ $homeSlider->background ? asset('storage/'.$homeSlider->background->path) : asset('website/images/home/home-5-bg.jpg') }}');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="position-relative" style="z-index: 1;">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="me-4">
                                <h6 class="sub-title mb-3">{{ __('website.school_profile_title') }}</h6>
                                <h1 class="mb-4">{{ $homeSlider->title ?? '' }}</h1>
                                <p class="text-muted fs-17">{{ $homeSlider->description ?? '' }}</p>
                                <div class="mt-4">
                                    <a href="#contact" class="btn btn-primary mt-2">{{ __('website.contact') }}</a>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-5 ms-auto">
                            <div class="subscribe-form box-shadow mt-4 mt-lg-0">
                                <div class="text-center mb-4 pb-2">
                                    <p class="text-muted text-uppercase mb-2">{{ __('website.school_profile_title') }}</p>
                                    <h5>{{ __('website.student_registration_title') }}</h5>
                                </div>
                                <form id="studentRegistrationForm">
                                    @csrf
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.student_name') }}*</label>
                                        <input type="text" name="student_name" class="form-control" placeholder="{{ __('website.student_name') }}" required>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.educational_stage') }}*</label>
                                        <select name="educational_stage_id" id="educational_stage" class="form-control" required>
                                            <option value="">{{ __('website.select_stage') }}</option>
                                            @foreach($educationalStages as $stage)
                                                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.class') }}*</label>
                                        <select name="class_id" id="class_room" class="form-control" required>
                                            <option value="">{{ __('website.select_class') }}</option>
                                            <!-- Classes will be populated by JS -->
                                        </select>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.date_of_birth') }}*</label>
                                        <input type="date" name="birth_date" class="form-control" required>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.phone') }}*</label>
                                        <input type="text" name="phone" class="form-control" placeholder="{{ __('website.phone') }}" required>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="{{ __('website.email') }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">{{ __('website.notes') }}</label>
                                        <textarea name="notes" class="form-control" rows="2" placeholder="{{ __('website.notes') }}"></textarea>
                                    </div>
                                    <div class="pt-2">
                                        <button type="submit" id="submitBtn" class="btn btn-primary w-100">{{ __('website.register_now') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end container-->
        </section><!-- END HOME -->
        <!-- START SHAPE -->
        <div class="position-relative">
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 250">
                    <g mask="url(&quot;#SvgjsMask1036&quot;)" fill="none">
                        <path d="M 0,214 C 96,194 288,120.8 480,114 C 672,107.2 768,201.4 960,180 C 1152,158.6 1344,41.6 1440,7L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                    </g>
                    <defs>
                        <mask id="SvgjsMask1036">
                            <rect width="1440" height="250" fill="#ffffff"></rect>
                        </mask>
                    </defs>
                </svg>
            </div>
        </div>
        <!-- END SHAPE -->

        <!-- START SERVICE -->
        <section class="section" id="service">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-5">
                            <h4 class="heading">{{ __('website.why_choose_us') }}</h4>
                            <p class="text-muted fs-17">{{ __('website.school_profile_desc') }}</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">

                    @foreach($whyChooseUs as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4 box-shadow">
                            <img
                                src="{{ $item->image }}"
                                onerror="src='{{ asset('website/images/feature/img-02.png') }}'"
                                alt=""
                                class="img-fluid"
                            >
                            <h5 class="fs-18 mt-4">{{ $item->title }}</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">{{ $item->description }}</p>
                        </div>
                    </div>
                    <!--end col-->
                    @endforeach

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END SERVICE -->

        <!-- START About -->
        <section class="section bg-light">
            <div class="container">
                <div class="row align-items-center g-3 g-lg-0">
                    <div class="col-lg-6">
                        <div class="skill-box bg-white p-4 rounded box-shadow">
                            <h3 class="mb-2">{{ $oneAbout->title ?? '' }}</h3>
                            <p class="text-muted">{{ $oneAbout->description ?? '' }}</p>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 about-img">
                        <img src="{{ isset($oneAbout) && $oneAbout->first_photo ? $oneAbout->first_photo->url : asset('website/images/about.jpg') }}" class="img-fluid rounded box-shadow" alt="">
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END About -->

        <!-- START PROCESS -->
        <section class="bg-process section" id="process">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="header-title text-center">
                            <h4 class="mb-3">{{ __('website.Educational stages') }}</h4>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-2">
                    @foreach($educationalStages as $index => $educationalStage)
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box process-border text-center">
                            <div class="process-count text-white mt-4">
                                <h3 class="process-number">0{{ $index + 1 }}</h3>
                                </div>

                            <div class="process-content bg-light mt-5 rounded p-4">
                                <h5 class="fs-18">{{ $educationalStage->title }}</h5>
                                <p class="text-muted mb-0">{{ $educationalStage->description }}</p>
                            </div>
                        </div>
                        <!--end process-box-->
                    </div>
                    <!--end col-->
                    @endforeach
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END PROCESS -->

        <!-- START COUNTER -->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                            <h4>{{ $facility->{'title_'.app()->getLocale()} ?? '' }}</h4>
                            <p class="text-muted mt-2">{{ $facility->{'description_'.app()->getLocale()} ?? '' }}</p>

                            <div class="mt-4 mb-5">
                                <div class="row" id="counter">
                                   @if($facility->details)
                                       @foreach($facility->details as $detail)
                                        <div class="col-md-6">
                                            <div class="counter-box mt-4">
                                                <div class="d-flex">
                                                    <div class="counter-icon">
                                                        <i class="mdi mdi-layers"></i>
                                                    </div>
                                                    <div class="flex-grow-1 mx-3">
                                                    <h4 class="counter_value" data-target="{{ $detail->count }}">{{ $detail->count }}</h4>
                                                    <p class="text-muted">{{ $detail->title }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end counter-box-->
                                        </div>
                                        <!-- END COL -->
                                        @endforeach
                                    @endif
                                </div>
                                <!-- END ROW -->                    
                            </div>
                        </div>

                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{ isset($facility) && $facility->image ? $facility->image : asset('website/images/achivements.jpg')}}" class="img-fluid box-shadow-lg rounded" alt="">
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!--end container-->
        </section>
        <!-- END COUNTER -->

        <!-- START TESTIMONIAL -->
        <section class="section" id="testimonial">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="header-title text-center">
                            <p class="text-uppercase text-muted mb-2">{{ __('website.Testimonials') }}</p>
                            <h3>{{ __('website.What Customers Said About Our Lumin') }}</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3"> </p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row mt-5 pt-2">
                    <div class="col-lg-12">
                        <div id="testimonialSlider" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                @foreach($testimonials as $index => $testimonial)
                                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="{{ $index }}"
                                    class="active" aria-current="true" aria-label="Slide 1"><img
                                        src="{{ $testimonial->media?->url }}"
                                        onerror="src='{{asset("website/images/users/img-5.jpg")}}'" alt=""
                                        class="testi-img  img-fluid rounded mx-auto d-block"></button>
                                @endforeach
                            </div>

                            <div class="carousel-inner">
                                @foreach($testimonials as $index => $testimonial)
                                <div class="carousel-item {{ !$index ? 'active' : ''}}">
                                    <div class="testimonial-box text-center mt-4">
                                        <div class="testimonial-content rounded">
                                            <p class="text-muted mb-0">{{ $testimonial->description }}</p>
                                        </div>
                                        <i class="mdi mdi-format-quote-close text-primary display-3"></i>
                                        <h5 class="fs-18">{{ $testimonial->name }}</h5>
                                        <p class="text-muted mb-0">{{ $testimonial->job }}</p>
                                    </div>
                                </div><!--end carousal-item-->
                                @endforeach
                            </div><!--end carousal-inner-->

                            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSlider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#testimonialSlider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END TESTIMONIAL -->

        <!-- START TEAM -->
        <section class="section bg-light" id="team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="header-title text-center">
                            <p class="text-uppercase text-muted mb-2">{{ __('website.TEAM MEMBERS') }}</p>
                            <h3>{{ __('website.Profesional People') }}</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3"> </p>
                        </div>
                    </div>
                    <!-- END COL -->
                </div>
                <!-- END ROW -->

                <div class="row mt-5">
                    @foreach($teams as $team)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-box text-center">
                            <div class="team-img position-relative">
                                <img src="{{ $team->media?->url }}" onerror="src='{{asset("website/images/users/img-2.jpg")}}'" class="img-fluid rounded" alt="">
                                <div class="team-content">
{{--                                    <ul class="list-inline mb-0 p-0">--}}
{{--                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>--}}
{{--                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>--}}
{{--                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-whatsapp"></i></a></li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="#" class="text-primary">
                                    <h5 class="fs-18 mb-1">{{ $testimonial->name }}</h5>
                                </a>
                                <p class="mb-0">{{ $testimonial->job }}</p>
                        </div>
                    </div>
                        <!--end team-box-->
                    </div>
                    <!-- END COL -->
                    @endforeach
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END TEAM -->

          <!--start portfolio-->
          <section class="section" id="portfolio">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="header-title text-center">
                            <p class="text-uppercase text-muted mb-2">{{ __('website.portfolio') }}</p>
                            <h3>{{ __('website.our_works') }}</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">{{ __('website.portfolio_desc') }}</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row my-4 pt-2">
                    <div class="col-lg-12">
                        <div class="filters-group">
                            <ul class="nav filter-options list-unstyled list-inline justify-content-center">
                                <li data-group="all" class="active nav-link list-inline-item mt-2">
                                    {{ __('website.All Categories') }}</li>
                                @foreach($campusTourCategories as $category)
                                <li data-group="{{ $category->id }}" class="nav-link list-inline-item mt-2 mx-1">
                                    {{ $category->{'title_'.app()->getLocale()} }}</li>
                                @endforeach
                            </ul>
                            <!--end portfolio-list-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-5">
                <div class="row g-2" id="grid">
                    <div class="col-1 my-sizer-element"></div>
                    @foreach($campusTours as $tour)
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["{{ $tour->campus_tour_category_id }}"]'>
                        <div class="portfolio-box rounded">
                            @if($tour->type == 'video')
                                <video class="img-fluid w-100" style="height: 250px; object-fit: cover;" controls>
                                    <source src="{{ asset($tour->video) }}" type="video/mp4">
                                    {{ __('website.video_not_supported') }}
                                </video>
                            @elseif($tour->type == 'link')
                                @php
                                    $link = $tour->link;
                                    if (str_contains($link, 'youtube.com/watch?v=')) {
                                        $link = str_replace('youtube.com/watch?v=', 'youtube.com/embed/', $link);
                                    } elseif (str_contains($link, 'youtu.be/')) {
                                        $link = str_replace('youtu.be/', 'youtube.com/embed/', $link);
                                    }
                                @endphp
                                <iframe class="img-fluid w-100" style="height: 250px;" src="{{ $link }}" frameborder="0" allowfullscreen></iframe>
                            @else
                                <img class="img-fluid w-100" style="height: 250px; object-fit: cover;" src="{{ asset($tour->image) }}" onerror="this.src='{{ asset('website/images/portfolio/img-1.jpg') }}'" alt="work-img" />
                            @endif

                            <div class="portfolio-content">
                                @if($tour->type == 'image')
                                <div class="img-view">
                                    <a href="{{ asset($tour->image) }}" class="text-muted image-popup">
                                        <i class="mdi mdi-plus"></i>
                                    </a>
                                </div>
                                @endif
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">{{ $tour->{'title_'.app()->getLocale()} }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->     
                    </div>
                    <!--end col-->
                    @endforeach
                </div><!--end row-->
            </div><!--end container-fluid-->
        </section>
        <!--end portfolio-->

        <!-- START CTA -->
        <section class="bg-cta">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="header-title text-center">
                            <h2>{{ __('website.cta_title') }}</h2>
                            <p class="title-desc text-muted mt-3"> {{ __('website.cta_desc') }} </p>
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary mt-2">{{ __('website.get_started') }}</a>
                            </div>
                        </div>

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END CTA -->

        <!-- START CONTACT -->
        <section class="section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center mb-4">
                            <p class="text-uppercase text-muted mb-2">{{ __('website.contact') }}</p>
                            <h3 class="text-uppercase">{{ __('website.Contact With Us') }}</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3"> </p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-map-marker text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">{{ __('website.Address') }}</h6>
                                <p class="text-muted mb-0">{!! $setting->address !!}</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-phone text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">{{ __('website.phone') }}</h6>
                                <p class="text-muted mb-0">{{ $setting->mobile }}</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-email text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">{{ __('website.Email') }}</h6>
                                <p class="text-muted mb-0">{{ $setting->email }}</p>                           
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-calendar-clock text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">{{ __('website.working_hours') }}</h6>
                                <p class="text-muted mb-0">{{ __('website.working_days') }}</p>
                                <p class="text-muted mb-0">{{ __('website.holiday') }}</p>
                                
                            </div>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->

                <div class="row mt-5 pt-2 justify-content-center">

                    <div class="col-lg-9">
                        <div class="custom-form">
                            <form method="post" id="contactForm">
                                <p id="error-msg"></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('website.Name') }}* :</label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="{{ __('website.Name') }}">
                                        </div>
                                    </div><!--end col-->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('website.Email') }}* :</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="{{ __('website.Email') }}">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="number" class="form-label">{{ __('website.phone') }}* :</label>
                                            <input type="tel" class="form-control" name="phone" id="number"
                                                placeholder="{{ __('website.phone') }}">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">{{ __('website.Your Subject') }} :</label>
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="{{ __('website.Your Subject') }}">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="comments" class="form-label">{{ __('website.Message') }} :</label>
                                            <textarea class="form-control" placeholder="{{ __('website.Message') }}"
                                                name="message" id="comments" style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3 text-end">
                                            <input type="submit" id="submitContact" name="send" class="submitBnt btn btn-primary"
                                                value="{{ __('website.Send Message') }}">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END CONTACT -->


@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data from server
        const educationalStages = @json($educationalStages);
        const stageSelect = document.getElementById('educational_stage');
        const classSelect = document.getElementById('class_room');
        const form = document.getElementById('studentRegistrationForm');
        const submitBtn = document.getElementById('submitBtn');

        // Translations & Validation Regex
        const trans = {
            select_class: @json(__('website.select_class')),
            register_now: @json(__('website.register_now')),
            sending: @json(__('website.Sending...')),
            registration_successful: @json(__('website.registration_successful')),
            ok: @json(__('website.ok') ?? "OK"),
            validation_error: @json(__('website.validation_error') ?? "Please check the form input."),
            required: @json(__('website.validation.required')),
            email: @json(__('website.validation.email')),
            phone: @json(__('website.validation.phone')),
            numeric: @json(__('website.validation.numeric')),
        };

        const regex = {
            email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
            phone: /^01[0125][0-9]{8}$/
        };

        // Helper: Show Error
        function showError(input, message) {
            input.classList.add('is-invalid');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = message;
            input.parentElement.appendChild(errorDiv);
        }

        // Helper: Clear Errors
        function clearErrors(formElement) {
            formElement.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            formElement.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        // Helper: Validate Field
        function validateField(input, type, required = true) {
            if (!input) return false;
            const value = input.value.trim();
            if (required && !value) {
                showError(input, trans.required);
                return false;
            }
            if (value && type === 'email' && !regex.email.test(value)) {
                showError(input, trans.email);
                return false;
            }
            if (value && type === 'phone' && !regex.phone.test(value)) {
                showError(input, trans.phone);
                return false;
            }
            return true;
        }

        // Handle Stage Change
        if(stageSelect){
            stageSelect.addEventListener('change', function() {
                const stageId = this.value;
                classSelect.innerHTML = '<option value="">' + trans.select_class + '</option>';

                if (stageId) {
                    const selectedStage = educationalStages.find(stage => stage.id == stageId);
                    if (selectedStage && selectedStage.classes) {
                        selectedStage.classes.forEach(function(cls) {
                            const option = document.createElement('option');
                            option.value = cls.id;
                            option.textContent = cls.name; 
                            classSelect.appendChild(option);
                        });
                    }
                }
            });
        }

        // Handle Form Submission for Student Registration
        if(form){
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                clearErrors(this);

                let isValid = true;
                isValid &= validateField(this.querySelector('[name="student_name"]'), 'text');
                isValid &= validateField(this.querySelector('[name="email"]'), 'email', false);
                isValid &= validateField(this.querySelector('[name="phone"]'), 'phone');
                isValid &= validateField(this.querySelector('[name="educational_stage_id"]'), 'select');
                isValid &= validateField(this.querySelector('[name="class_id"]'), 'select');
                isValid &= validateField(this.querySelector('[name="birth_date"]'), 'text');

                if (!isValid) return;

                submitBtn.disabled = true;
                submitBtn.innerHTML = trans.sending;

                const formData = new FormData(this);

                fetch("{{ route('student-registration.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json().then(data => ({status: response.status, body: data})))
                .then(result => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = trans.register_now;

                    if (result.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: trans.registration_successful,
                            text: result.body.message || trans.registration_successful,
                            confirmButtonText: trans.ok
                        });
                        form.reset();
                        classSelect.innerHTML = '<option value="">' + trans.select_class + '</option>';
                    } else if (result.status === 422) {
                        const errors = result.body.errors;
                        Object.keys(errors).forEach(key => {
                            const input = form.querySelector(`[name="${key}"]`);
                            if (input) {
                                showError(input, errors[key][0]);
                            }
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: trans.validation_error
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = trans.register_now;
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Network error. Please try again.'
                    });
                });
            });
        }

        // Contact Form
        const contactForm = document.getElementById('contactForm');
        const submitContactBtn = document.getElementById('submitContact');

        if(contactForm){
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                clearErrors(this);

                let isValid = true;
                isValid &= validateField(this.querySelector('[name="name"]'), 'text');
                isValid &= validateField(this.querySelector('[name="email"]'), 'email');
                isValid &= validateField(this.querySelector('[name="phone"]'), 'phone');
                // isValid &= validateField(this.querySelector('[name="subject"]'), 'text'); // Optional/Not used by backend
                isValid &= validateField(this.querySelector('[name="message"]'), 'text');

                if (!isValid) return;

                submitContactBtn.disabled = true;
                const originalBtnText = submitContactBtn.value;
                submitContactBtn.value = trans.sending;

                const formData = new FormData(this);

                fetch("{{ route('contact.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json().then(data => ({status: response.status, body: data})))
                .then(result => {
                    submitContactBtn.disabled = false;
                    submitContactBtn.value = originalBtnText;

                    if (result.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: result.body.message,
                            confirmButtonText: trans.ok
                        });
                        contactForm.reset();
                    } else if (result.status === 422) {
                         const errors = result.body.errors;
                        Object.keys(errors).forEach(key => {
                            const input = contactForm.querySelector(`[name="${key}"]`);
                            if (input) {
                                showError(input, errors[key][0]);
                            }
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: trans.validation_error
                        });
                    } else {
                         Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!'
                        });
                    }
                })
                .catch(error => {
                    submitContactBtn.disabled = false;
                    submitContactBtn.value = originalBtnText;
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Network error.'
                    });
                });
            });
        }
    });
</script>
@endpush