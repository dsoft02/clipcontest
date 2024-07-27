<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="A contest voting platform where users vote for their favorite videos">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? siteName('404') : siteName() }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ siteFavicon() }}" type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" >


</head>

<body>
    <div class="page error-bg" id="particles-js">
        <!-- Start::error-page -->
        <div class="main-error-wrapper page-h">
            <img src="{{ asset('assets/images/media/pngs/1.png') }}" class="error-page-img" alt="error">
            <h2 class="title">Oopps. The page you were looking for doesn't exist.</h2>
            <h6 class="sub_title">You may have mistyped the address or the page may have moved.</h6>
            <a class="btn btn-outline-danger" href="{{ route('home') }}">Back to Home</a>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('assets/js/show-password.js') }}"></script>

</body>

</html>