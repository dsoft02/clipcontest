<!-- Start of Selection -->
<aside class="app-sidebar sticky {{ request()->routeIs('home') ? '' : 'sticky-pin no-home' }}" id="sidebar">

    <div class="container p-0">
        <!-- Start::main-sidebar -->
        <div class="main-sidebar">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills sub-open">
                <div class="landing-logo-container">
                    <div class="horizontal-logo">
                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ siteLogo('light_logo') }}" alt="logo" class="desktop-logo">
                            <img src="{{ siteLogo('dark_logo') }}" alt="logo" class="desktop-white">
                        </a>
                    </div>
                </div>
                <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg></div>
                <ul class="main-menu">
                    <!-- Start::slide -->
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('home') }}">
                            <span class="side-menu__label">Home</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ route('contestants') }}" class="side-menu__item">
                            <span class="side-menu__label">Contestants</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ route('leaderboard') }}" class="side-menu__item">
                            <span class="side-menu__label">Leaderboard</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    @if (isDeclareWinnerEnabled())
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('winner') }}" class="side-menu__item">
                                <span class="side-menu__label">Winner</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                    @endif

                </ul>
                <div class="slide-right" id="slide-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->
    </div>

</aside>
