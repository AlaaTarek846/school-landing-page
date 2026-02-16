
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>zoric | Responsive Bootstrap 5 Landing Page Template | Codebucks</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap v5.3.3 Landing Page Template" />
        <meta name="keywords" content="Bootstrap v5.3.3, premium, marketing, multipurpose" />
        <meta content="Codebucks" name="author" />

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('website/images/favicon.ico')}}" />

        <!-- Bootstrap css -->
        <link href="{{ asset('website/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Materialdesign Css -->
        <link href="{{ asset('website/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Unicon Css -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

        <!-- Light-Box Css -->
        <link rel="stylesheet" href="{{ asset('website/css/glightbox.min.css')}}" type="text/css" />

        <!-- Custom Css -->
        <link href="{{ asset('website/css/style.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">

        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>
        <!-- End Preloader-->

          <!-- header-area -->
     @include('layout.website.header')

     @yield('content')

    <!-- footer-area -->
    @include('layout.website.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('layout.website.script')

    @stack('script')

     





    

    </body>

</html>