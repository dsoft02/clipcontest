<x-app-layout>
    <x-slot name="title">System Settings</x-slot>
    <!-- Start::app-content -->
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">System Settings</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">System Settings</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex my-xl-auto right-content align-items-center">
                <div class="pe-1 mb-xl-0">
                    <a href="{{ route('dashboard') }}" class="btn btn-dark">Dashboard</a>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            System Settings
                        </div>
                        <p class="mg-b-20"></p>
                        @include('components.flash-message')
                        @include('components.toastr')
                        <form class="form-horizontal" name="app-ettings" id="app-ettings" method="POST"
                            action="{{ route('settings.update') }}" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            <div class="row row-xs">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Application Name</label>
                                    <input name="site_name" class="form-control" placeholder="Application Name"
                                        type="text" value="{{ getSettings()->site_name }}" required>
                                </div>
                            </div>
                            <div class="row row-xs">
                                <div class="form-group col-md-12">
                                    <div class="form-check form-switch mb-2 d-flex align-items-center">
                                        <input class="form-check-input form-check-input-custom mt-0 me-1"
                                            type="checkbox" role="switch" id="enable_voting" name="enable_voting"
                                            value="1" @if (isVotingEnabled()) checked="" @endif>
                                        <label class="form-label mb-0">Enable Voting<small class="text-muted ">
                                                <i>(If you enable this setting, the visitors will be able to
                                                    vote.)</i></small></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-xs">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Voting End Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input type="text" class="form-control" id="datetime" name="voting_enddate" placeholder="Choose voting en date and time">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-xs">
                                <div class="form-group col-md-12">
                                    <div class="form-check form-switch mb-2 d-flex align-items-center">
                                        <input class="form-check-input form-check-input-custom mt-0 me-1"
                                            type="checkbox" role="switch" id="declare_winner" name="declare_winner"
                                            value="1" @if (isDeclareWinnerEnabled()) checked="" @endif>
                                        <label class="form-label mb-0">Declare Winner<small class="text-muted ">
                                                <i>(If you enable this setting, the voting will be disabled and the
                                                    winner will be declared.)</i></small></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs mb-4 mt-3">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="form-label">Dark Icon</label>
                                    <input class="form-control form-control-sm" id="dark_icon" name="dark_icon"
                                        type="file" accept="image/jpeg,image/png">
                                    <div class="text-wrap mt-1 bg-gray-100">
                                        <div><img alt="Responsive image" class="img-fluid ht-45" id="imgdarkicon"
                                                src="{{ siteLogo('dark_icon') }}"></div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="form-label">Light Icon</label>
                                    <input class="form-control form-control-sm" id="light_icon" name="light_icon"
                                        type="file" accept="image/jpeg,image/png">
                                    <div class="text-wrap mt-1 bg-gray-100">
                                        <div><img alt="Responsive image" class="img-fluid ht-45" id="imglighticon"
                                                src="{{ siteLogo('light_icon') }}"></div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="form-label">Dark Logo</label>
                                    <input class="form-control form-control-sm" id="dark_logo" name="dark_logo"
                                        type="file" accept="image/jpeg,image/png">
                                    <div class="text-wrap mt-1 bg-gray-100">
                                        <div><img alt="Responsive image" class="img-fluid ht-45" id="imgdarklogo"
                                                src="{{ siteLogo('dark_logo') }}"></div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="form-label">Light Logo</label>
                                    <input class="form-control form-control-sm" id="light_logo" name="light_logo"
                                        type="file" accept="image/jpeg,image/png">
                                    <div class="text-wrap mt-1 bg-gray-100">
                                        <div><img alt="Responsive image" class="img-fluid ht-45" id="imglightlogo"
                                                src="{{ siteLogo('light_logo') }}"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="float-end">
                                    <input type="submit" id="save_changes" value="Save Changes"
                                        class="btn btn-lg btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::row-1 -->

    </div>
    <!-- End::app-content -->
    @push('custom-css')
    <!-- FlatPickr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    @endpush

    @push('custom-js')
     <!-- Date & Time Picker JS -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/date&time_pickers.js') }}"></script>
        {{--  <script>
            document.addEventListener('DOMContentLoaded', function() {
                const enableVotingCheckbox = document.getElementById('enable_voting');
                const declareWinnerCheckbox = document.getElementById('declare_winner');

                enableVotingCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        declareWinnerCheckbox.checked = false; // Uncheck declare_winner
                    }
                });

                declareWinnerCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        enableVotingCheckbox.checked = false; // Uncheck enable_voting
                    }
                });
            });
        </script>  --}}
    @endpush
</x-app-layout>
