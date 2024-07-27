<x-app-layout>
    <x-slot name="title">Leaderboard</x-slot>
    <!-- Start::app-content -->
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div class="my-auto">
                    <h5 class="page-title fs-21 mb-1">Leaderboard</h5>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('contestants.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leaderboard</li>
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

            <!-- row opened -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">LEADERBOARD</h4>
                            </div>
                            <p class="fs-12 text-muted mb-0">The leaderboard showcases the contestants with the highest votes so far.</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsiveDataTable" class="table table-hover text-nowrap w-100">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Position</th>
                                            <th>Participant Details</th>
                                            <th>Votes</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse ($leaderboard as $index => $contestant)
                                        <tr>
                                            <td>
                                                @if ($index + 1 == 1)
                                                    <img src="{{ asset('assets/images/pos_gold.svg') }}" />
                                                @else
                                                    <div class="ranking-number">{{ $index + 1 }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center w-100">
                                                    <div class="me-2">
                                                        <span class="avatar rounded">
                                                            <a href="javascript:void(0);" onclick="fetchContestantDetails('{{ $contestant->id }}')" class="position-relative">
                                                                <img src="{{ $contestant->cover_image_url }}" class="object-fit-cover">
                                                                <div class="play-button-overlay play-button-overlay-sm">
                                                                    <i class="ri-play-fill"></i>
                                                                </div>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="">
                                                        <div class="fs-15 fw-semibold">{{ $contestant->name }}</div>
                                                        <p class="mb-0 text-muted op-7 fs-12">Description {{ strLimit($contestant->description) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><h5 class="fw-bold">{{ count($contestant->votes) }}</h5></td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <img src="{{ asset('assets/images/svgicons/note_taking.svg') }}" alt="" class="w-35 mx-auto">
                                                    <h5 class="mt-3 tx-18">No Record Found</h5>
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
            <!-- row closed -->

        </div>
    <!-- End::app-content -->
    @include('partials.leaderboard-modal')

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
