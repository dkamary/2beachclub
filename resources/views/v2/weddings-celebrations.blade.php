{{-- v2/private-gathering --}}

@php
    // header
    $headerBg = asset('v2/img/events/private-gatherings/2beach-club-weddings-header.webp');
    $headerTitle = 'Weddings & Celebrations';

    // content
    $contentBg = asset(
        'v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-header.webp',
    );
    $contentBgMini = asset(
        'v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-header-1.webp',
    );

@endphp

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ $headerBg }}" :title="$headerTitle">

        <div class="container bg-white my-5">

            <x-widget.section :id="$id ?? null" :lazyload="true" :bg-image="$contentBg" :bg-image-mini="$contentBgMini" :bg-class="['w-100']"
                :text-class="['bg-white']" text-placement="center" text-size="col-11 col-md-10 mx-auto">

                <div class="row mb-3">
                    <div class="col-12">
                        <h2 class="special-heading fs-1 fw-bold text-center pb-2">{!! $headerTitle !!}</h2>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12 swap-container">
                        <p>
                            Experience the epitome of luxury and romance at 2Beach Club, the perfect venue for dream
                            weddings and celebrations.
                            Nestled in the idyllic Pereybere in northern Mauritius, our exclusive venue offers a range of
                            exquisite spaces to suit your unique vision.
                            Whether you desire an intimate gathering or a grand affair, 2Beach Club provides an unparalleled
                            backdrop for your special day.
                        </p>

                        <div class="row my-5 swap-section">
                            <div class="col-12 col-md-6 img-part">
                                <img class="img-fluid lazy-load-image w-100"
                                    src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-exclusive-spaces-1.webp') }}"
                                    data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-exclusive-spaces.webp') }}">
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-part">
                                <h3 class="special-heading fs-5 fw-semibold text-start pt-3 pb-2">Exclusive Spaces for Your
                                    Special
                                    Occasion</h3>

                                <p>
                                    Our venue boasts a selection of refined settings, including an elegant restaurant, a
                                    stunning
                                    poolside area with a breathtaking beachfront, a sophisticated rooftop venue, and an
                                    indoor space
                                    ideal for private events. Each location offers its own distinct charm, allowing you to
                                    choose
                                    the perfect ambiance for your celebration.
                                </p>
                                <p>
                                    Picture saying "I do" on the sandy shores with the azure waters as your backdrop, or
                                    hosting an
                                    elegant reception
                                    under the stars with a panoramic view of the ocean.
                                </p>
                            </div>
                        </div>

                        <div class="row my-5 swap-section">
                            <div class="col-12 col-md-6 img-part">
                                <img class="img-fluid lazy-load-image w-100"
                                    src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-breath-taking-view-squared-1.webp') }}"
                                    data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-breath-taking-view-squared.webp') }}">
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-part">
                                <h3 class="special-heading fs-5 fw-semibold text-start pt-3 pb-2">Breathtaking Beachfront
                                    Ceremonies
                                </h3>

                                <p>
                                    Imagine exchanging vows with the serene sounds of waves and a captivating sunset as your
                                    backdrop.
                                    Our beachfront setting offers a truly magical experience, providing a picturesque and
                                    romantic
                                    atmosphere that will leave a lasting impression on you and your guests.
                                    he golden hues of the setting sun create a perfect canvas for your photos, making your
                                    special
                                    moments even more unforgettable.
                                </p>
                            </div>
                        </div>

                        <div class="row my-5 swap-section">
                            <div class="col-12 col-md-6 img-part">
                                <img class="img-fluid lazy-load-image w-100"
                                    src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-tailored-culinary-food-squared-1.webp') }}"
                                    data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-tailored-culinary-food-squared.webp') }}">
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center text-part">
                                <h3 class="special-heading fs-5 fw-semibold text-start pt-3 pb-2">Tailored Culinary
                                    Excellence</h3>

                                <p>
                                    At 2Beach Club, we understand that exceptional cuisine is an integral part of any
                                    celebration.
                                    Our renowned catering team offers a range of gourmet options, from lavish buffets to
                                    bespoke
                                    themed menus,
                                    all tailored to meet your specific tastes and preferences. Whether you envision a
                                    decadent feast
                                    or elegant finger foods,
                                    our culinary experts will craft a menu that delights and impresses.
                                </p>
                            </div>
                        </div>

                        <div class="row my-5 swap-section">
                            <div class="col-12 col-md-6 img-part">
                                <img class="img-fluid lazy-load-image w-100 text-part"
                                    src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-square-1.webp') }}"
                                    data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-private-gatherings-weddings-pereybere-mauritius-square.webp') }}">
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                                <h3 class="special-heading fs-5 fw-semibold text-start pt-3 pb-2">Personalized Planning and
                                    Flexibility</h3>

                                <p>
                                    We believe that every celebration should be as unique as the couple or individual hosting it.
                                    Our experienced team will closely work with your dedicated event planner to bring your dream
                                    event to life.
                                    Our goal is to ensure that your celebration reflects your style and exceeds your expectations.
                                </p>
                            </div>
                        </div>

                        <p>
                            We look forward to welcoming you to 2Beach Club. Contact us today to learn more,
                            or visit us to experience the beauty and elegance of our venue firsthand.
                        </p>

                        <div class="d-flex justify-content-center">
                            <div class="btn-container contact-button book-table my-4">
                                <a href="{{ route('home') }}#contact-us" class="text-uppercase">
                                    Contact us
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </x-widget.section>

        </div>

    </x-layout.v2>
@endsection

@push('head')
    <style id="private-gathering--styles">
        .text-overlapping {
            margin-top: -10rem;
        }

        .swap-container .swap-section:nth-child(2n) > .img-part {
            order: 2;
        }

        .swap-container .swap-section:nth-child(2n) > .text-part {
            order: 1;
        }

        @media screen and (max-width: 576px) {
            .text-overlapping {
                margin-top: unset;
            }

            .swap-container .swap-section:nth-child(2n) > .img-part {
                order: 1;
            }

            .swap-container .swap-section:nth-child(2n) > .text-part {
                order: 2;
            }
        }
    </style>
@endpush
