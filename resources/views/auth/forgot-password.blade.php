<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-slot name="title">Forgot Password</x-slot>

    <div class="row bg-white">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
            <div class="row w-100 mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                    <img src="{{  asset('assets/images/media/pngs/3.png') }}"
                        class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex">
                                    <a href="index.html" class="header-logo">
                                        <img src="{{ siteLogo('light_logo') }}" alt="logo" class="desktop-logo ht-40">
                                        <img src="{{ siteLogo('dark_logo') }}" alt="logo" class="desktop-white ht-40">
                                    </a>
                                </div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h3>Forgot Password? </h3>
                                        <p class="fs-14 text-muted mb-4">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                                        </p>
                                        <x-alert :messages="$errors->all()" />
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus autocomplete="username"/>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-block w-100" name="submitbtn" id="submitbtn" value="{{ __('Email Password Reset Link') }}"/>

                                        </form>
                                        <div class="main-signin-footer mt-3">
                                            <p>Forget it, <a href="{{ route('login') }}"> Send me back</a> to the sign in screen.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</x-guest-layout>
