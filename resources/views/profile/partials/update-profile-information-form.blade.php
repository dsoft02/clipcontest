<!-- Start::row-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    {{ __('Profile Information') }}
                </div>
                <p class="mt-1 mb-5 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's profile information and email address.") }}
                </p>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="name">Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email"
                                            id="email" placeholder="Email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-lg btn-primary waves-effect waves-light"
                                        name="submitbtn" id="submitbtn" value="Save Changes" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End::row-1 -->
