<x-app-layout>
    <x-slot name="title">Contestants</x-slot>
    <!-- Start::app-content -->
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Contestants</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('contestants.index') }}">Contestants</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Contestant</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div class="pe-1 mb-xl-0">
                    <a href="{{ route('contestant.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New Contestant</a>
                </div>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0 mb-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">Contestant List</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.flash-message')
                            @include('components.toastr')
                            <div class="table-responsive">
                                <table id="exportDataTable" class="table table-bordered table-vcenter w-100">
                                    <thead class="table-primary">
                                        <tr>
                                            <th style="width: 30%;">Participant Details</th>
                                            <th style="width: 15%;">Created</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse($contestants as $contestant)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="me-2">
                                                            <span class="avatar rounded">
                                                                <img src="{{ $contestant->cover_image_url }}" class="object-fit-cover">
                                                            </span>
                                                        </div>
                                                        <div class="">
                                                            <div class="fs-15 fw-semibold">{{ $contestant->name }}</div>
                                                            <p class="mb-0 text-muted op-7 fs-12">
                                                                <a class="icon-link text-decoration-underline icon-link-hover link-primary" href="{{ $contestant->video_link }}" target="_blank"> Video link <i class="bi bi-arrow-right"></i>
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $contestant->created_at->format('F j, Y, g:i a') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('contestant.edit',$contestant->id) }}" class="btn btn-sm btn-info btn-b" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit Contestant">
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('contestant.destsroy', $contestant->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete Contestant" onclick="return confirm('Are you sure you want to delete this contestant?');">
                                                            <i class="las la-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <img src="{{ asset('assets/images/svgicons/note_taking.svg') }}" alt="" class="w-35 mx-auto"> <h5 class="mt-3 tx-18">No Record Found</h5>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End::row-1 -->

    </div>
    <!-- End::app-content -->
    @push('custom-css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    @endpush

    @push('custom-js')
    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- Internal Datatables JS -->
    <script src="{{ asset('assets/js/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/contest.js') }}"></script>
    @endpush
</x-app-layout>
