<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <!-- Choices JS -->
        <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

        <!-- Main Theme Js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- Bootstrap Css -->
        <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >

        <!-- Style Css -->
        <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet" >

        <!-- Simplebar Css -->
        <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet" >

        <!-- Color Picker Css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

        <!-- Jsvector Maps -->
        <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom-styles.css') }}">


         <!-- Custom CSS -->
        @stack('custom-css')
</head>

<body class="main-body app sidebar-mini ltr dark-menu dark-header light-theme">

    <!-- Loader -->
    <div id="loader" >
        <img src="{{ asset('assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        @include('partials.app-header')
       <!-- /app-header -->

       <!-- Start::app-sidebar -->
       @include('partials.app-sidebar')
       <!-- End::app-sidebar -->

       <!-- Start::app-content -->
       <div class="main-content app-content">
       {{ $slot }}
       </div>
       <!-- End::app-content -->

        <!-- Footer Start -->
        @include('partials.app-footer')
        <!-- Footer End -->

    </div>


    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="las la-angle-double-up"></i></span>
    </div>
    <!-- Scroll To Top -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/general.js') }}"></script>


    <!-- Custom JS -->
    @stack('custom-js')

</body>

</html>