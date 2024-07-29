<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <!-- Start::app-content -->
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Hi, welcome back!</h4>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row -->
            <div class="row">
                <div class="col-6">
                    <div class="card bg-primary-gradient text-fixed-white ">
                        <div class="card-body text-fixed-white">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 mt-2 text-center">
                                        <i class="fe fe-users fs-40"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-0 text-center">
                                        <span class="text-fixed-white">Entries</span>
                                        <h3 class="text-fixed-white mb-0">{{ $totalContestants }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-success-gradient text-fixed-white">
                        <div class="card-body text-fixed-white">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon1 mt-2 text-center">
                                        <i class="fe fe-bar-chart-2 fs-40"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-0 text-center">
                                        <span class="text-fixed-white">Votes</span>
                                        <h3 class="text-fixed-white mb-0">{{ number_format($totalVotes) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- row closed -->

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
                                            <th data-priority="1">Participant Name</th>
                                            <th data-priority="2">Votes</th>
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
                                                    <div class="fs-15 fw-semibold">{{ $contestant->name }}</div>
                                                </td>
                                                <td>
                                                    <h5 class="fw-bold">{{ count($contestant->votes) }}</h5>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <img src="{{ asset('assets/images/svgicons/note_taking.svg') }}"
                                                        alt="" class="w-35 mx-auto">
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
