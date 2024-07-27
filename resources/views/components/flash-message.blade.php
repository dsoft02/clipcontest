<!-- resources/views/components/flash-messages.blade.php -->

@if (session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 mb-4 bg-danger-transparent alert p-0 alert-danger">
                <div class="card-header py-2 d-flex align-items-center text-danger fw-bold">
                    <i class="me-2 far fa-times-circle"></i> Error
                    <button type="button" class="btn-close ms-auto p-0" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div class="card-body text-danger py-2">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
@endif

@php
    $errorBags = $errors->getBags();
@endphp

@foreach ($errorBags as $bagName => $messages)
    @if ($messages->any())
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 mb-4 bg-danger-transparent alert p-0 alert-danger">
                    <div class="card-header py-2 d-flex align-items-center text-danger fw-bold">
                        <i class="me-2 far fa-times-circle"></i> <strong>{{ ucfirst($bagName) }} Errors:</strong>
                        <button type="button" class="btn-close ms-auto p-0" data-bs-dismiss="alert" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="card-body text-danger py-2">
                        @foreach ($messages->all() as $message)
                            <div>{{ $message }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach


@if (session()->has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 mb-4 bg-success-transparent alert p-0 alert-success">
                <div class="card-header py-2 d-flex align-items-center text-success fw-bold">
                    <i class="me-2 far fa-check-circle"></i> Success
                    <button type="button" class="btn-close ms-auto p-0" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div class="card-body text-success py-2">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if (session()->has('message'))
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 mb-4 bg-info-transparent alert p-0 alert-info">
                <div class="card-header py-2 d-flex align-items-center text-info fw-bold">
                    <i class="me-2 far fa-question-circle"></i> Info
                    <button type="button" class="btn-close ms-auto p-0" data-bs-dismiss="alert" aria-label="Close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div class="card-body text-info py-2">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    </div>
@endif
