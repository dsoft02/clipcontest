<x-site-layout>
    <x-slot name="title">Leaderboard</x-slot>

    <!-- Start:: Section-2 -->
    <section class="section section-bg " id="contestants">
        <div class="container main-banner-container">
            <h3 class="fw-semibold text-center mb-2">Leaderboard</h3>
            <div class="landing-title"></div>
            <div class="row text-center justify-content-center">
                <div class="col-xl-7">
                    <p class="text-muted fs-15 mb-5 fw-normal">
                        The leaderboard showcases the contestants with the highest votes so far. Support your favorite
                        contestant by casting your vote and help them win an all-expense paid trip to Barbados with
                        Blaqbonez.
                    </p>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-xl-12">
                    <div class="card custom-card no-padding">
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
                                                                <a href="javascript:void(0);"
                                                                    onclick="fetchContestantDetails('{{ $contestant->id }}')"
                                                                    class="position-relative">
                                                                    <img src="{{ $contestant->cover_image_url }}"
                                                                        class="object-fit-cover">
                                                                    <div
                                                                        class="play-button-overlay play-button-overlay-sm">
                                                                        <i class="ri-play-fill"></i>
                                                                    </div>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div class="">
                                                            <div class="fs-15 fw-semibold">{{ $contestant->name }}</div>
                                                            <p class="mb-0 text-muted op-7 fs-12">Description
                                                                {{ strLimit($contestant->description) }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fw-bold">{{ count($contestant->votes) }}</h5>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <img src="{{ asset('assets/images/svgicons/note_taking.svg') }}"
                                                        alt="" class="w-35">
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
        </div>
    </section>
    <!-- End:: Section-2 -->
    @include('partials.leaderboard-modal')
    <!-- Include the Winner Modal Component only if winner is set -->
    @if (isset($winner) && isDeclareWinnerEnabled())
        <x-winner-modal :winner="$winner" />
    @endif
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

</x-site-layout>
