<x-site-layout>
    <x-slot name="title">Contestants</x-slot>

    <!-- Section for contestants -->
    <section class="section section-bg" id="contestants">
        <div class="container main-banner-container">
            <h3 class="fw-semibold text-center mb-2">Fire On Me Campaign</h3>
            <div class="landing-title"></div>
            <div class="row text-center justify-content-center">
                <div class="col-xl-7">
                    <p class="text-muted fs-15 mb-5 fw-normal">In partnership with Barbados ministry of tourism, a lucky
                        girl stands a chance to win an all-expense paid trip to Barbados with Blaqbonez.</p>
                </div>
            </div>
            @include('components.flash-message')
            @include('components.toastr')
            <div class="row g-2">
                @foreach ($contestants as $contestant)
                    <div class="col-xl-4">
                        <div class="card custom-card">
                            <a href="javascript:void(0);" onclick="fetchContestantDetails({{ $contestant->id }})"
                                class="position-relative">
                                <img src="{{ $contestant->cover_image_url }}" class="card-img-top video-cover"
                                    alt="Video Cover">
                                <div class="play-button-overlay">
                                    <i class="ri-play-fill"></i>
                                </div>
                            </a>
                            <div class="card-body pb-1">
                                <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                    <div>
                                        <h6 class="fw-bold">{{ $contestant->name }}</h6>
                                        <p class="card-text mb-3 text-muted">{{ $contestant->description }}</p>
                                    </div>
                                    <p class="mb-0 text-primary">Total Votes: <span
                                            class="fw-bolder">{{ $contestant->getTotalVotesCount() }} Votes</span></p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex">
                                    <div class="btn-list">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ route('contestant.show', $contestant->id) }}"
                                            class="btn btn-icon btn-facebook btn-wave share-btn"><i
                                                class="ri-facebook-line"></i></a>
                                        <a target="_blank"
                                            href="https://twitter.com/intent/tweet?url={{ route('contestant.show', $contestant->id) }}&text={{ route('contestant.show', $contestant->id) }}"
                                            class="btn btn-icon btn-twitter btn-wave share-btn"><i
                                                class="ri-twitter-line"></i></a>
                                        <a target="_blank"
                                            href="https://www.instagram.com/?url={{ route('contestant.show', $contestant->id) }}"
                                            class="btn btn-icon btn-instagram btn-wave share-btn"><i
                                                class="ri-instagram-line"></i></a>
                                        <a target="_blank"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('contestant.show', $contestant->id) }}&title={{ route('contestant.show', $contestant->id) }}"
                                            class="btn btn-icon btn-primary btn-wave share-btn"><i
                                                class="ri-linkedin-line"></i></a>
                                    </div>
                                    @if (isVotingEnabled())
                                        <a href="javascript:void(0);" class="btn btn-primary btn-wave ms-auto"
                                            onclick="showVoteModal({{ $contestant->id }})"><i
                                                class="fa fa-vote-yea"></i> Vote</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal for video and details -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Participant's Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="ratio ratio-16x9">
                                <iframe id="videoPlayer" width="560" height="315"
                                    src="https://www.youtube.com/embed/cJgIi5X-x6c?si=R7orHaEozr4P_4ZL"
                                    title="video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                <div>
                                    <h6 class="fw-bold" id="contestantName">Contestant Name</h6>
                                    <p id="videoDescription">Contestant Description</p>
                                </div>
                                <p class="mb-0 text-primary">Total Votes: <span id="totalVotes" class="fw-bolder">0
                                        Votes</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between w-100">
                        <div class="btn-list">
                            <a target="_blank" href="javascript:void(0);" id="facebook-btn"
                                class="btn btn-icon btn-facebook btn-wave share-btn"><i
                                    class="ri-facebook-line"></i></a>
                            <a target="_blank" href="javascript:void(0);" id="twitter-btn"
                                class="btn btn-icon btn-twitter btn-wave share-btn"><i class="ri-twitter-line"></i></a>
                            <a target="_blank" href="javascript:void(0);" id="instagram-btn"
                                class="btn btn-icon btn-instagram btn-wave share-btn"><i
                                    class="ri-instagram-line"></i></a>
                            <a target="_blank" href="javascript:void(0);" id="linkedin-btn"
                                class="btn btn-icon btn-primary btn-wave share-btn"><i
                                    class="ri-linkedin-line"></i></a>
                        </div>
                        @if (isVotingEnabled())
                            <button" id="voteButton" class="btn btn-primary btn-wave" onclick="showVoteModal()"><i
                                    class="fa fa-vote-yea"></i> Vote</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isVotingEnabled())
        <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('vote.store') }}" id="voteForm" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="voteModalLabel">Vote for Contestant</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                onclick="clearVoteForm()"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Enter your email to vote</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <input type="hidden" id="contestantId" name="contestant_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                onclick="clearVoteForm()">Close</button>
                            <input type="submit" class="btn btn-primary" value="Submit Vote" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Include the Winner Modal Component only if winner is set -->
    @if (isset($winner) && isDeclareWinnerEnabled())
        <x-winner-modal :winner="$winner" />
    @endif
    <script>
        function clearVoteForm() {
            document.getElementById('voteForm').reset();
        }

        function showVoteModal(contestantId) {
            document.querySelector('#voteModal #contestantId').value = contestantId;
            var voteModal = new bootstrap.Modal(document.getElementById('voteModal'));
            voteModal.show();
        }

        function fetchContestantDetails(contestantId) {
            $.ajax({
                url: '/ajax/contestants/' + contestantId,
                method: 'GET',
                success: function(data) {
                    var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
                    var modalElement = videoModal._element;
                    modalElement.querySelector('#contestantName').innerText = data.name;
                    modalElement.querySelector('#videoDescription').innerText = data.description;
                    modalElement.querySelector('#totalVotes').innerText = data.totalVotes;

                    // Update the video URL for YouTube embedding
                    var videoUrl = data.videoUrl;
                    var embedUrl = videoUrl.replace("watch?v=", "embed/");
                    modalElement.querySelector('#videoPlayer').src = embedUrl;

                    // Generate shareable links for social media
                    const shareText = `Vote for ${data.name} in the contest!`;
                    const shareUrl = encodeURIComponent(data.shareableLink);
                    modalElement.querySelector('#facebook-btn').href =
                        `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
                    modalElement.querySelector('#twitter-btn').href =
                        `https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareText}`;
                    modalElement.querySelector('#instagram-btn').href =
                        `https://www.instagram.com/?url=${shareUrl}`;
                    modalElement.querySelector('#linkedin-btn').href =
                        `https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${shareText}`;

                    @if (isVotingEnabled())
                        var voteButton = document.getElementById('voteButton');
                        voteButton.setAttribute('onclick', 'showVoteModal(' + contestantId + ')');
                    @endif

                    videoModal.show();
                },
                error: function() {
                    alert('Error fetching contestant details.');
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.addEventListener("DOMContentLoaded", function() {
                $('#videoModal').on('hide.bs.modal', function() {
                    var iframe = document.getElementById('videoPlayer');
                    iframe.src = "";
                });
            });

            @if ($id)
                fetchContestantDetails({{ $id }});
            @endif

        });
    </script>
</x-site-layout>
