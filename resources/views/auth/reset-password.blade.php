<x-guest-layout>
    <x-slot name="title">Reset Password</x-slot>

    <div class="row bg-white">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
            <div class="row w-100 mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                    <img src="{{ asset('assets/images/media/pngs/6.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                        <form method="POST" action="{{ route('password.store') }}">
                                            @csrf
                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            <div class="form-group mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password" class="form-label">New Password</label>
                                                <input class="form-control" type="password" name="password" id="password"  placeholder="Enter your New Password" type="password" required autocomplete="new-password" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                <input class="form-control" type="password_confirmation" name="password_confirmation" id="password"  placeholder="Enter your Confirm Password" type="password" required autocomplete="new-password" />
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-block w-100" name="submitbtn" id="submitbtn" value="{{ __('Reset Password') }}"/>
                                        </form>
                                        <div class="main-signin-footer mt-3">
                                            <p>Remembered your password? <a href="{{ route('login') }}">Sign In</a></p>
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
