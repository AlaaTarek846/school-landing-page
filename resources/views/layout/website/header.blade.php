   <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky" id="navbar">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo text-uppercase" href="index-5.html">
                    <img src="images/logo-dark.png" class="logo-light" alt="logo-light" height="22">
                    <img src="images/logo-dark.png" class="logo-dark" alt="logo-dark" height="22">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse order-lg-2 justify-content-center" id="navbarCollapse">
                    <ul class="navbar-nav navbar-center">
                        <li class="nav-item">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#service" class="nav-link">Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="#process" class="nav-link">Process</a>
                        </li>
                        <li class="nav-item">
                            <a href="#testimonial" class="nav-link">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a href="#portfolio" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
                <!--end navabar-collapse-->
                <div class="header-btn ms-auto ms-lg-0 order-lg-3">
                    @if (App::isLocale('ar'))
                        <a href="{{ route('change.language', 'en') }}" class="btn btn-sm btn-language">English</a>
                    @else
                        <a href="{{ route('change.language', 'ar') }}" class="btn btn-sm btn-language">Arabic</a>
                    @endif
                </div>
                <!--end navabar-collapse-->
            </div>
            <!--end container-->
        </nav>
        <!-- Navbar End -->