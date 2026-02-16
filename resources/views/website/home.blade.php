@extends('layout.website.master')

@section('title', __('website.home'))

@section('content')

        <!-- START HOME -->
        <section class="bg-home5" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="position-relative" style="z-index: 1;">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="me-4">
                                <h6 class="sub-title mb-3">zoric Template</h6>
                                <h1 class="mb-4">Leading Digital Business For <span class="text-primary">Software</span>  Solution</h1>
                                <p class="text-muted fs-17">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-primary mt-2">Discover More</a>
                                    <a class="btn btn-primary ms-sm-1 image-popup mt-2" href="https://www.w3schools.com/html/mov_bbb.mp4"><svg width="24" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video icons"><g><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></g></svg> Watch Now</a>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-5 ms-auto">
                            <div class="subscribe-form box-shadow mt-4 mt-lg-0">
                                <div class="text-center mb-4 pb-2">
                                    <p class="text-muted text-uppercase mb-2">Welcome to zoric</p>
                                    <h5>Get 30 Days Free Trial</h5>
                                </div>
                                <form action="#">
                                    <div class="mb-4 position-relative">
                                        <label for="exampleFormControlInput1" class="form-label">Name*</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name">
                                    </div>
                                    <div class="mb-4 position-relative">
                                        <label for="exampleFormControlInput2" class="form-label">Email*</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter your email">
                                    </div>
                                    <div class="mb-4 position-relative">
                                        <label for="exampleFormControlInput3" class="form-label">Number*</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput3" placeholder="Enter your number">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="exampleFormControlTextarea4" class="form-label">Message</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Enter message"></textarea>
                                      </div>
                                    <div class="pt-2">
                                        <button type="submit" class="btn btn-primary w-100">Get Started</button>
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
                    <div class="col-lg-7">
                        <div class="header-title text-center">
                            <p class="text-uppercase text-muted mb-2">Services We're Provided</p>
                            <h3>We do all Creative Services</h3>
                            <div class="title-border mt-3"></div>
                            <p class="text-muted mt-3">We craft digital, graphic and dimensional thinking, to create category leading brand experiences that have meaning and add a value.</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4">
                            <img src="{{asset('website/images/feature/img-01.png')}}" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Web design</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3">Those who do not know how to pursue pleasure rationally encounter
                                consequences that are extremely painful.</p>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4 box-shadow">
                            <img src="{{asset('website/images/feature/img-02.png')}}" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Development</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">Due to its widespread use as filler text for layouts,
                                non-readability is of great importance.</p>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4">
                            <img src="images/feature/img-03.png" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Branding</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">There are many variations of passages of available, but the majority alteration in some form.</p>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4 box-shadow">
                            <img src="{{asset('website/images/feature/img-04.png')}}" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Easy to customize</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">The generated Lorem Ipsum is therefore always free from repetition, injected humour.</p>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4">
                            <img src="{{asset('website/images/feature/img-05.png')}}" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Unrivaled Quality</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">It is a long established fact that a reader will be distracted
                                by the readable content of a page.</p>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-6">
                        <div class="service-box text-center mt-4 box-shadow">
                            <img src="{{asset('website/images/feature/img-06.png')}}" alt="" class="img-fluid">
                            <h5 class="fs-18 mt-4">Online Marketing</h5>
                            <div class="lighlight-border mt-3"></div>
                            <p class="text-muted mt-3 mb-0">This is required when, for example, the is not yet available.
                                Dummy text is also known as 'fill text'.</p>
                        </div>
                    </div>
                    <!--end col-->
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
                            <p class="text-uppercase mb-1">About Agency</p>
                            <h3 class="mb-2">Leading Digital Agency for Business Solution.</h3>
                            <p class="text-muted">When a good idea comes, you know, part of my job is to move it around,
                                just see what people think, get people talking about it.</p>
                            <div class="skills">
                                <div class="mt-4">
                                    <p class="fw-bold mb-2">Web Design</p>
                                    <div class="progress">
                                        <div class="progress-bar rounded" style="width:80%;">
                                            <p class="progress-value fs-15 fw-bold">80%</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="fw-bold mb-2">Development</p>
                                    <div class="progress">
                                        <div class="progress-bar rounded" style="width:60%;">
                                            <div class="progress-value fs-15 fw-bold">60%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="fw-bold mb-2">Branding</p>
                                    <div class="progress">
                                        <div class="progress-bar rounded" style="width:40%;">
                                            <div class="progress-value fs-15 fw-bold">40%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="fw-bold mb-2">Code</p>
                                    <div class="progress">
                                        <div class="progress-bar rounded" style="width:75%;">
                                            <div class="progress-value fs-15 fw-bold">75%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 about-img">
                        <img src="{{asset('website/images/about.jpg')}}" class="img-fluid rounded box-shadow" alt="">
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
                    <div class="col-lg-7">
                        <div class="header-title text-center">
                            <h3>Our Process</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">We craft digital, graphic and dimensional thinking, to
                                create category leading brand experiences that have meaning and add a value.</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row mt-5 pt-2">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box process-border text-center">
                            <div class="process-count text-white mt-4">
                                <h3 class="process-number">01</h3>
                            </div>

                            <div class="process-content bg-light mt-5 rounded p-4">
                                <h5 class="fs-18">Concept</h5>
                                <p class="text-muted mb-0">It is a long established fact that a reader at its layout.</p>
                            </div>
                        </div>
                        <!--end process-box-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box process-border text-center">
                            <div class="process-count text-white mt-4">
                                <h3 class="process-number">02</h3>
                            </div>

                            <div class="process-content bg-light mt-5 rounded p-4">
                                <h5 class="fs-18">Plan</h5>
                                <p class="text-muted mb-0">It is a long established fact that a reader at its layout.</p>
                            </div>
                        </div>
                        <!--end process-box-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box process-border text-center">
                            <div class="process-count text-white mt-4">
                                <h3 class="process-number">03</h3>
                            </div>

                            <div class="process-content bg-light mt-5 rounded p-4">
                                <h5 class="fs-18">Design</h5>
                                <p class="text-muted mb-0">It is a long established fact that a reader at its layout.</p>
                            </div>
                        </div>
                        <!--end process-box-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="process-box text-center">
                            <div class="process-count text-white mt-4">
                                <h3 class="process-number">04</h3>
                            </div>

                            <div class="process-content bg-light mt-5 rounded p-4">
                                <h5 class="fs-18">Development</h5>
                                <p class="text-muted mb-0">It is a long established fact that a reader at its layout.</p>
                            </div>
                        </div>
                        <!--end process-box-->
                    </div>
                    <!--end col-->
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
                        <div class="counter-box">
                            <h4>Our Achivements</h4>
                            <p class="text-muted mt-2">You can combine all the zoric You can combine all the zoric templates
                                into a single one, you can take a component from the Application theme and use it in the
                                Website. It seems that only fragments of the original text remain in only fragments the Lorem Ipsum texts used today.</p>

                            <div class="mt-4 mb-5">
                                <div class="row" id="counter">

                                    <div class="col-md-6">
                                        <div class="counter-box mt-4">
                                            <div class="d-flex">
                                                <div class="counter-icon">
                                                    <i class="mdi mdi-heart"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4 class="counter_value" data-target="485">0</h4>
                                                    <p class="text-muted">Happy Clients</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end counter-box-->
                                    </div>
                                    <!-- END COL -->

                                    <div class="col-md-6">
                                        <div class="counter-box mt-4">
                                            <div class="d-flex">
                                                <div class="counter-icon">
                                                    <i class="mdi mdi-layers"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4 class="counter_value" data-target="536">0</h4>
                                                    <p class="text-muted">Projects Completed</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end counter-box-->
                                    </div>
                                    <!-- END COL -->
                                </div>
                                <!-- END ROW -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="counter-box mt-4">
                                            <div class="d-flex">
                                                <div class="counter-icon">
                                                    <i class="mdi mdi-cloud-download"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4 class="counter_value" data-target="1652">0</h4>
                                                    <p class="text-muted mb-0">Files Downloaded</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end counter-box-->
                                    </div>
                                    <!-- END COL -->
                                    <div class="col-md-6">
                                        <div class="counter-box mt-4">
                                            <div class="d-flex">
                                                <div class="counter-icon">
                                                    <i class="mdi mdi-code-not-equal-variant"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4 class="counter_value" data-target="14652">0</h4>
                                                    <p class="text-muted mb-0">Liens Of Code</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end counter-box-->
                                    </div>
                                    <!-- END COL -->
                                </div>
                                <!-- END ROW -->
                            </div>
                        </div>
                    </div>
                    <!-- END COL -->

                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{asset('website/images/achivements.jpg')}}" class="img-fluid box-shadow-lg rounded" alt="">
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!--end row-->
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
                            <p class="text-uppercase text-muted mb-2">Testimonial</p>
                            <h3>Some lovely Feedback from our Clients</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">We craft digital, graphic and dimensional thinking, to
                                create category leading brand experiences that have meaning and add a value.</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row mt-5 pt-2">
                    <div class="col-lg-12">
                        <div id="testimonialSlider" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"><img
                                        src="{{asset('website/images/users/img-5.jpg')}}" alt=""
                                        class="testi-img  img-fluid rounded mx-auto d-block"></button>
                                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="1"
                                    aria-label="Slide 2"> <img src="{{asset('website/images/users/img-6.jpg')}}" alt=""
                                        class="testi-img img-fluid mx-auto d-block"></button>
                                <button type="button" data-bs-target="#testimonialSlider" data-bs-slide-to="2"
                                    aria-label="Slide 3">
                                    <img src="{{asset('website/images/users/img-7.jpg')}}" alt=""
                                        class=" testi-img img-fluid rounded mx-auto d-block">
                                </button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="testimonial-box text-center mt-4">
                                        <div class="testimonial-content rounded">
                                            <p class="text-muted mb-0">" Very well thought out and articulate communication.
                                                Clear milestones, deadlines and fast work. Patience. Infinite patience. No
                                                shortcuts. Even if the client is being careless. "</p>
                                        </div>
                                        <i class="mdi mdi-format-quote-close text-primary display-3"></i>
                                        <h5 class="fs-18">Jennifer Shapiro</h5>
                                        <p class="text-muted mb-0">Frontend</p>
                                    </div>
                                </div><!--end carousal-item-->

                                <div class="carousel-item">
                                    <div class="testimonial-box text-center mt-4">
                                        <div class="testimonial-content rounded">
                                            <p class="text-muted mb-0">" It looks perfect on all major browsers, tablets,
                                                and mobile devices. All files are organized we believe it will be easy to
                                                use and edit them. This template is well organized and very easy to
                                                customize. "</p>
                                        </div>
                                        <i class="mdi mdi-format-quote-close text-primary display-3"></i>
                                        <h5 class="fs-18">Brandon Carney</h5>
                                        <p class="text-muted mb-0">Designer</p>
                                    </div>
                                </div><!--end carousal-item-->

                                <div class="carousel-item">
                                    <div class="testimonial-box text-center mt-4">
                                        <div class="testimonial-content rounded">
                                            <p class="text-muted mb-0">" All your client websites if you are an agency or
                                                freelancer. It got all the tools needs to create super fast responsive
                                                websites with amazing user experience. We have added a Dark version with RTL
                                                supported. "</p>
                                        </div>
                                        <i class="mdi mdi-format-quote-close text-primary display-3"></i>
                                        <h5 class="fs-18">William Mooneyhan</h5>
                                        <p class="text-muted mb-0">Developer</p>
                                    </div>
                                </div><!--end carousal-item-->
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
                            <p class="text-uppercase text-muted mb-2">meet our Expert</p>
                            <h3>Amazing and talented People work here</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">Porttitor dolor donec pulvinar tortor nisi quis dapibus
                                tortor commodo sed Pellentesque hendrerit pellentesque libero nec sollicitudin.</p>
                        </div>
                    </div>
                    <!-- END COL -->
                </div>
                <!-- END ROW -->

                <div class="row mt-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-box text-center">
                            <div class="team-img position-relative">
                                <img src="{{asset('website/images/users/img-2.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="team-content">
                                    <ul class="list-inline mb-0 p-0">
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="#" class="text-primary">
                                    <h5 class="fs-18 mb-1">Juliana Waddell</h5>
                                </a>
                                <p class="mb-0">CEO & Founder</p>
                            </div>
                        </div>
                        <!--end team-box-->
                    </div>
                    <!-- END COL -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-box text-center">
                            <div class="team-img position-relative">
                                <img src="{{asset('website/images/users/img-1.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="team-content">
                                    <ul class="list-inline mb-0 p-0">
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="#" class="text-primary">
                                    <h5 class="fs-18 mb-1">Tyler Raymer</h5>
                                </a>
                                <p class="mb-0">Project Manager</p>
                            </div>
                        </div>
                        <!--end team-box-->
                    </div>
                    <!-- END COL -->

                    <div class="col-lg-3 col-md-6">
                        <div class="team-box text-center">
                            <div class="team-img position-relative">
                                <img src="{{asset('website/images/users/img-3.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="team-content">
                                    <ul class="list-inline mb-0 p-0">
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-3">
                                <a href="#" class="text-primary">
                                    <h5 class="fs-18 mb-1">Chris Lewis</h5>
                                </a>
                                <p class="mb-0">UI/UX Designer</p>
                            </div>
                        </div>
                        <!--end team-box-->
                    </div>
                    <!-- END COL -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-box text-center">
                            <div class="team-img position-relative">
                                <img src="{{asset('website/images/users/img-4.jpg')}}" class="img-fluid rounded" alt="">
                                <div class="team-content">
                                    <ul class="list-inline mb-0 p-0">
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="mdi mdi-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="p-3">
                                <a href="#" class="text-primary">
                                    <h5 class="fs-18 mb-1">Juliana Waddell</h5>
                                </a>
                                <p class="mb-0">Web Developer</p>
                            </div>
                        </div>
                        <!--end team-box-->
                    </div>
                    <!-- END COL -->
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
                            <p class="text-uppercase text-muted mb-2">Portfolio</p>
                            <h3>Our Works</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">We craft digital, graphic and dimensional thinking, to
                                create category leading brand experiences that have meaning and add a value.</p>
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
                                    All</li>
                                <li data-group="project" class="nav-link list-inline-item mt-2">
                                    Project</li>
                                <li data-group="design" class="nav-link list-inline-item mt-2">
                                    Design</li>
                                <li data-group="photography" class="nav-link list-inline-item mt-2">
                                    Photography</li>
                                <li data-group="development" class="nav-link list-inline-item mt-2">
                                    Development</li>
                            </ul>
                            <!--end portfolio-list-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-5">
                <div class="row g-2" id="grid">
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["photography","development"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-1.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-1.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Motion Graphic</h5>
                                    </a>
                                    <p class="mb-0">Photography, Development</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->     
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["photography"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-2.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-2.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Creative Flyer</h5>
                                    </a>
                                    <p class="mb-0">Photography</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["development"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-3.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-3.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Stories Collective</h5>
                                    </a>
                                    <p class="mb-0">Development</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["project", "design"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-4.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-4.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Lightning Shot</h5>
                                    </a>
                                    <p class="mb-0">Project, Design</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["development","project","design"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-5.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-5.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Mockup Collection</h5>
                                    </a>
                                    <p class="mb-0">Development, Project, Design</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["photography"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-6.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-6.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Company V-card</h5>
                                    </a>
                                    <p class="mb-0">Photography</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["development","design"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-7.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-6.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Mockup box with paints</h5>
                                    </a>
                                    <p class="mb-0">Development, Design</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["photography"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="{{asset('website/images/portfolio/img-8.jpg')}}" alt="work-img" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="{{asset('website/images/portfolio/img-6.jpg')}}" class="text-muted image-popup"><i
                                            class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18">Pen and article</h5>
                                    </a>
                                    <p class="mb-0">Photography</p>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
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
                            <h2>Become a part of zoric bussiness community today</h2>
                            <p class="title-desc text-muted mt-3"> Start working with zoric that can provide everything you
                                need to generate awareness, drive traffic, connect. </p>
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary mt-2">Get Started</a>
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
                            <p class="text-uppercase text-muted mb-2">Contact</p>
                            <h3 class="text-uppercase">Get In Touch</h3>
                            <div class="title-border mt-3"></div>
                            <p class="title-desc text-muted mt-3">We craft digital, graphic and dimensional thinking, to
                                create category leading brand experiences that have meaning and add a value.</p>
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
                                <h6 class="fs-17">Main Office</h6>
                                <p class="text-muted mb-0">2276 Lynn Ogden Lane Beaumont Lodgeville Road TX 77701</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-phone text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">Phone & Email</h6>
                                <p class="text-muted mb-0">Phone: +71 612-234-4023</p>
                                <p class="text-muted mb-0">Fax: +954-627-9727</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-email text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">Contact</h6>
                                <p class="text-muted mb-0"> www.exampledesign.com</p>
                                <p class="text-muted mb-0"> example@design.com</p>                           
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-6">
                        <div class="contact-info text-center mt-5">
                            <div class="icon">
                                <i class="mdi mdi-calendar-clock text-primary h4"></i>
                            </div>
                            <div class="mt-4 pt-2">
                                <h6 class="fs-17">Working Hours</h6>
                            <p class="text-muted mb-0"> Monday-friday: 9:00- 06:00</p>
                                <p class="text-muted mb-0"> Saturday-Sunday: Holiday</p>
                                
                            </div>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->

                <div class="row mt-5 pt-2 justify-content-center">

                    <div class="col-lg-9">
                        <div class="custom-form">
                            <form method="post" name="myForm" onsubmit="return validateForm()">
                                <p id="error-msg"></p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name* :</label>
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Enter your name">
                                        </div>
                                    </div><!--end col-->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address* :</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="number" class="form-label">Phone number* :</label>
                                            <input type="tel" class="form-control" name="number" id="number"
                                                placeholder="Enter your number">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="comments" class="form-label">Comments :</label>
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                name="comments" id="comments" style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mt-3 text-end">
                                            <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary"
                                                value="Send Message">
                                            <div id="simple-msg"></div>
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