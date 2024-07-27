<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed" data-theme-mode="light">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="A contest voting platform where users vote for their favorite videos">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? siteName($title) : siteName() }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ siteFavicon() }}" type="image/x-icon">

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >


    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet" >

    <!-- SwiperJS Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-styles.css') }}">

    <!-- Custom CSS -->
    @stack('custom-css')

    <!-- Scripts -->
    {{--  @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}

</head>

<body class="landing-body">

    <div class="landing-page-wrapper">

        <!-- app-header -->
        @include('partials._site_header')
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        @include('partials._site_sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content landing-main">
        {{ $slot }}
        </div>
        <!-- End::app-content -->

    </div>

        <!-- Start::app-footer -->
        @include('partials._site_footer')
        <!-- End::app-footer -->

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <!-- Internal Landing JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/general.js') }}"></script>

    <!-- Custom JS -->
    @stack('custom-js')

</body>

</html>