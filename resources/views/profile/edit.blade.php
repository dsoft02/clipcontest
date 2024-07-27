<x-app-layout>
    <x-slot name="title">Profile Update</x-slot>
    <!-- Start::app-content -->
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Profile Update</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Update</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <x-alert :messages="$errors->all()" />
        @include('components.toastr')
        <!-- Include flash messages component -->
        @include('components.flash-message')

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')

    </div>
    <!-- End::app-content -->
    @push('custom-css')
    @endpush

    @push('custom-js')
    @endpush
</x-app-layout>
