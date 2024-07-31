<x-app-layout>
    <x-slot name="title">Voting</x-slot>
    <!-- Start::app-content -->
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title fs-21 mb-1">Voting</h5>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('votes.index') }}">Voting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vote History</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
                <div class="pe-1 mb-xl-0">
                    <form method="POST" action="{{ route('votes.reset') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to reset all votes? This action cannot be undone.');">Reset All Votes</button>
                    </form>
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
                                <h4 class="card-title mb-0">Voting History</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('components.flash-message')
                            @include('components.toastr')
                            <div class="table-responsive">
                                <table id="exportDataTable" class="table table-bordered table-vcenter text-nowrap w-100">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Email</th>
                                            <th>IP</th>
                                            <th>Voted for</th>
                                            <th>Vote Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @forelse($votes as $key => $vote)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $vote->email }}</td>
                                                <td>{{ $vote->ip }}</td>
                                                <td>{{ $vote->contestant->name }}</td>
                                                <td>{{ $vote->created_at->format('d M Y H:i:s') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
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
