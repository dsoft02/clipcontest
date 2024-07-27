<!-- Start::row-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    {{ __('Update Password') }}
                </div>
                <p class="mt-1 mb-5 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>

                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-8">
                            {{--  <x-alert :messages="$errors->all()" />  --}}
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="update_password_current_password">Current Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="update_password_password">New Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="update_password_password" name="password" type="password" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="update_password_password_confirmation">Confirm Password</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-lg btn-primary waves-effect waves-light"
                                        name="submitbtn" id="submitbtn" value="Update Password" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End::row-1 -->
