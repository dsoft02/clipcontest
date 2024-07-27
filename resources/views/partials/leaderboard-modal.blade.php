<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="videoModalLabel">Participant's Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="ratio ratio-16x9">
                            <iframe id="videoPlayer" width="560" height="315" src="{{ asset('assets/video/1.mp4') }}"
                                title="Video player" style="border:0px"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-column justify-content-between gp-2" style="height: 100%;">
                            <div>
                                <div>
                                    <h6 class="fw-bold" id="contestantName">Contestant Name</h6>
                                    <p id="videoDescription">Contestant Description</p>
                                </div>
                                <p class="mb-0 text-primary">Total Votes: <span id="totalVotes" class="fw-bolder">0 Votes</span></p>
                            </div>
                            <div class="btn-list">
                                <a target="_blank" href="javascript:void(0);" id="facebook-btn" class="btn btn-icon btn-facebook btn-wave share-btn"><i class="ri-facebook-line"></i></a>
                                <a target="_blank" href="javascript:void(0);" id="twitter-btn" class="btn btn-icon btn-twitter btn-wave share-btn"><i class="ri-twitter-line"></i></a>
                                <a target="_blank" href="javascript:void(0);" id="instagram-btn" class="btn btn-icon btn-instagram btn-wave share-btn"><i class="ri-instagram-line"></i></a>
                                <a target="_blank" href="javascript:void(0);" id="linkedin-btn" class="btn btn-icon btn-primary btn-wave share-btn"><i class="ri-linkedin-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>