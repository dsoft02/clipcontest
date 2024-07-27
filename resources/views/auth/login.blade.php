<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-slot name="title">Login</x-slot>

    <div class="row bg-white">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
            <div class="row w-100 mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                    <img src="{{ asset('assets/images/media/pngs/5.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                        <h3>Welcome back!</h3>
                                        <h6 class="fw-medium mb-4 fs-17">Please sign in to continue.</h6>
                                        <x-alert :messages="$errors->all()" />
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus autocomplete="username"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" name="password" id="password"  placeholder="Enter your password" type="password" required autocomplete="current-password" />
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="form-group mb-3">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-block w-100" name="submitbtn" id="submitbtn" value="Sign In"/>
                                        </form>
                                        <div class="main-signin-footer mt-3">
                                            @if (Route::has('password.request'))
                                                <p class="mb-1"><a href="{{ route('password.request') }}">Forgot password?</a></p>
                                            @endif
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
