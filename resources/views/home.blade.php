<x-site-layout>
    <x-slot name="title">Home</x-slot>
    <!-- Start:: Section-1 -->
    <div class="landing-banner" id="home">
        <section class="section">
            <div class="container main-banner-container">
                <div class="demo-screen-headline main-demo main-demo spacing-top overflow-hidden reveal active"
                    id="home">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 animation-zidex pos-relative text-center text-lg-start text-white">
                            <h1 class="fw-bold text-white">Fire On Me Campaign</h1>
                            <h4 class="fw-semibold text-white mt-7">Blaqbonez's Latest Single</h4>
                            <h6 class="pb-3 text-white">
                                We are excited to introduce Blaqbonez’s latest single, “Fire On Me”, as part of our
                                “Finding Her” campaign. This campaign is designed to connect Blaqbonez with his Love.
                            </h6>
                            <h6 class="pb-3 text-white">
                                In partnership with Barbados ministry of tourism, a lucky girl stands a chance to win an
                                all-expense paid trip to Barbados with Blaqbonez.
                            </h6>
                            <a href="{{ route('contestants') }}"
                                class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i class="fe fe-play me-2"></i>
                                Goto contestants
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 my-auto d-none d-lg-block">
                            <div class="d-flex align-items-end flex-column">
                                <img src="{{ asset('assets/images/image00009.JPEG') }}"
                                    class="img-fluid object-fit-scale border rounded" alt=""
                                    style="height: 400px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End:: Section-1 -->

    <!-- Start:: Section-4 -->
    <section class="section" id="about">
        <div class="container text-center">
            <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">Entry Guidelines</span>
            </p>
            <div class="landing-title"></div>
            <h3 class="fw-semibold mb-2"> How to Participate in the "Finding Her" Campaign</h3>
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <p class="text-muted fs-15 mb-3 fw-normal">Follow these steps to enter the campaign and stand a
                        chance to win an all-expense-paid trip to Barbados with Blaqbonez.</p>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mx-0">
                <div class="col-xxl-4 col-xl-5 col-lg-5 text-center text-lg-start">
                    <img src="{{ asset('assets/images/contest-banner.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-xxl-8 col-xl-7 col-lg-7 pt-0 pb-0 px-lg-2 px-0 text-start">
                    <h4 class="text-lg-start fw-medium mb-4">Entry Guidelines:</h4>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="d-flex mb-2">
                                <span>
                                    <i class='bx bxs-badge-check text-primary fs-18'></i>
                                </span>
                                <div class="ms-2">
                                    <h6 class="fw-medium mb-0">1. Have a valid international passport (at least 6 months
                                        before expiry)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="d-flex mb-2">
                                <span>
                                    <i class='bx bxs-badge-check text-primary fs-18'></i>
                                </span>
                                <div class="ms-2">
                                    <h6 class="fw-medium mb-0">2. Create a fun video entry of 30-seconds to 1-minute
                                        showcasing your personality.</h6>
                                    <p class="text-muted mb-3">Be sure to include your name and where you’re from and
                                        explain why you believe you are Blaqbonez's true love.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="d-flex mb-2">
                                <span>
                                    <i class='bx bxs-badge-check text-primary fs-18'></i>
                                </span>
                                <div class="ms-2">
                                    <h6 class="fw-medium mb-0">3. Ensure your entry video is properly edited and use the
                                        sound "Blaqbonez - Fire On Me" on Tik Tok or Instagram.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="d-flex mb-2">
                                <span>
                                    <i class='bx bxs-badge-check text-primary fs-18'></i>
                                </span>
                                <div class="ms-2">
                                    <h6 class="fw-medium mb-0">4. Upload the video on your personal Tik Tok or Instagram
                                        page and Tag @Blaqbonez, @krakstv, @visitbarbados, and @choccitymusic in your
                                        entry video.</h6>
                                    <p class="text-muted">Include the hashtag #BlaqFindingHer in your post.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <p class="text-muted"><strong>NOTE:</strong> Video entries open on Friday, July 19, 2024,
                                and close on Monday, July 30, 2024. The winner will be selected by public voting and
                                will be announced on July 31, 2024. Visit @krakstv for final updates on the winner. The
                                winner must be prepared to travel anytime from August 1, 2024 - August 8, 2024.</p>
                        </div>
                    </div>
                    <div class="text-start">
                        <p>For more information:</p>
                        <p>Phone No: +2349139353154</p>
                        <p><a href="https://wa.me/2349139353154" target="_blank" class="btn btn-primary">Contact Us on
                                WhatsApp</a></p>
                        <p>Visit: <a class="icon-link text-decoration-underline icon-link-hover link-primary"
                                href="http://blaqbaddiesearch.chocolatecitymusic.com" target="_blank">
                                http://blaqbaddiesearch.chocolatecitymusic.com <i class="bi bi-arrow-right"></i> </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Section-4 -->
    <!-- Include the Winner Modal Component only if winner is set -->
    @if (isset($winner) && isDeclareWinnerEnabled())
        <x-winner-modal :winner="$winner" />
    @endif
</x-site-layout>
