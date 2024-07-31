<x-app-layout>
    <x-slot name="title">Edit Contestant</x-slot>
    <!-- Start::app-content -->
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Edit Contestant</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('contestants.index') }}">Contestants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Contestant</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex my-xl-auto right-content align-items-center">
                <div class="pe-1 mb-xl-0">
                    <a href="{{ route('contestants.index') }}" class="btn btn-dark"><i class="fa fa-list"></i> View Contestants</a>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-header pb-0 mb-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">Contestant Information</h4>
                            </div>
                        </div>
                        <form class="form-horizontal" name="edit-contestant" id="edit-contestant" method="POST" action="{{ route('contestant.update', $contestant->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <x-alert :messages="$errors->all()" />
                                        @include('components.flash-message')
                                        @include('components.toastr')
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label" for="name">Contestant Name</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" id="name" class="form-control"  placeholder="Contestant Name" value="{{ old('name', $contestant->name) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label" for="video_link">Video Link</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="video_link" id="video_link"  placeholder="Video Link" value="{{ old('video_link', $contestant->video_link) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label" for="cover_image">Cover Image</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" name="cover_image" id="cover_image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" name="submitbtn" id="submitbtn" value="Save Changes"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!--End::row-1 -->

    </div>
    <!-- End::app-content -->
    @push('custom-css')
    @endpush

    @push('custom-js')
    @endpush
</x-app-layout>
