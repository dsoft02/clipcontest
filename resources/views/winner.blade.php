<!-- resources/views/winner.blade.php -->

<x-site-layout>
    <x-slot name="title">Winner</x-slot>

    <!-- Start:: Section-2 -->
    <section class="section section-bg" id="contestants">
        <div class="container main-banner-container pt-2">
            @if ($winner)
                <div class="pyro">
                    <div class="before"></div>
                    <div class="after"></div>
                </div>
            @endif
            <div class="row justify-content-center align-items-center mx-0">
                <div class="col-md-8 text-center">
                    @if ($winner)
                        <img src="{{ asset('assets/images/winner.png') }}" alt="Winner" class="img-fluid w-50 mb-3">
                        <h3>Congratulations!</h3>
                        <h1>{{ $winner->name }}</h1>
                        <h4>Total Votes: {{ $winner->votes_count }}</h4>
                    @else
                        <div class="alert alert-info">
                            <h4 class="alert-heading">No Winner Yet</h4>
                            <p>The contest is still ongoing or no votes have been cast yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-2 -->
</x-site-layout>
