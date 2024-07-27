<!-- resources/views/components/winner-modal.blade.php -->

@props(['winner' => null])
<!-- resources/views/components/winner-modal.blade.php -->

@if ($winner)
    <!-- Modal -->
    <div class="modal fade" id="winnerModal" tabindex="-1" aria-labelledby="winnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="winnerModalLabel">Congratulations!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="pyro">
                        <div class="before"></div>
                        <div class="after"></div>
                    </div>
                    <img src="{{ asset('assets/images/winner.png') }}" alt="Winner" class="img-fluid mb-3 w-35">
                    <h1>{{ $winner->name }}</h1>
                    <h4>Total Votes: {{ $winner->votes_count }}</h4>
                </div>
            </div>
        </div>
    </div>
    @push('custom-js')
        <!-- Automatically trigger the modal on page load if the winner is present -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var winnerModal = new bootstrap.Modal(document.getElementById('winnerModal'));
                winnerModal.show();
            });
        </script>
    @endpush
@endif
