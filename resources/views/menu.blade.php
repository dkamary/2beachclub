{{-- Menu --}}

@php
    // header
    $headerBg = asset("v2/img/events/headers/2beach-club-events-headers-001.webp");
    $headerTitle = 'Our menus';

    // content
    $contentBg = asset('v2/img/restaurant/2beach-club-restaurant-sea-view.webp');
    $contentBgMini = asset('v2/img/restaurant/2beach-club-restaurant-sea-view-1.webp');
@endphp

@extends('_layouts.base')

@section('main')
    <x-layout.v2 :hero-header="true" bg-image="{{ $headerBg }}" title="" :icon="false">

        <div class="container bg-white my-5">

            <x-widget.section
                :id="$id ?? null"
                :lazyload="true"
                :bg-class="['w-100']"
                :text-class="['bg-white']"
                text-placement="center"
                text-size="col-11 col-md-10 mx-auto"
            >

                <div class="row mb-3">
                    <div class="col-12">

                        <h1 class="special-heading fs-1 fw-bold text-center pb-2">{!! $headerTitle !!}</h1>

                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        <p>
                            The restaurant at 2Beach Club invites you to indulge in a unique culinary experience where each menu is crafted to delight your taste buds. From the freshness of seafood to flavourful and authentic dishes, our chef has curated a selection that highlights the best local ingredients, blending tradition and innovation in every plate.
                        </p>
                    </div>

                </div>

                <div class="row my-4 g-3">

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#all-day-menu" id="all-day-menu-link" onclick="return false;">
                            <h2 class="special-heading fs-3 fw-bold text-center">The All-Day Feast</h2>
                            <img
                                data-src="{{ asset('v2/img/menu/all-day-dining-preview.webp') }}"
                                src="{{ asset('v2/img/menu/all-day-dining-preview-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="{{ route('menu_sunset') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Sundowner menu</h2>
                            <img
                                data-src="{{ asset('v2/img/menu/sunset.webp') }}"
                                src="{{ asset('v2/img/menu/sunset-preview.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="{{ route('menu_sushi') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">The Sushi Experience</h2>
                            <img data-src="{{ asset('v2/img/menu/sushis-preview.webp') }}"
                                src="{{ asset('v2/img/menu/sushis-preview-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="{{ route('menu_kids') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Kids’ Favourites</h2>
                            <img
                                data-src="{{ asset('v2/img/menu/Kids-burger.webp') }}"
                                src="{{ asset('v2/img/menu/Kids-burger-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    {{-- <div class="col-12 col-sm-6 mx-auto my-4">
                        <a href="{{ route('event_meetings') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Meetings &<br class="d-none d-sm-block d-lg-none"> Events</h2>
                            <img data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a href="{{ route('event_weddings_and_celebrations') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Weddings & Celebrations</h2>
                            <img
                                data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a href="{{ route('event_meetings') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Meetings &<br class="d-none d-sm-block d-lg-none"> Events</h2>
                            <img data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a href="{{ route('event_weddings_and_celebrations') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Weddings & Celebrations</h2>
                            <img
                                data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-weddings-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a href="{{ route('event_meetings') }}" class="text-decoration-none">
                            <h2 class="special-heading fs-3 fw-bold text-center">Meetings &<br class="d-none d-sm-block d-lg-none"> Events</h2>
                            <img data-src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square.webp') }}"
                                src="{{ asset('v2/img/events/private-gatherings/2beach-club-meetings-and-events-corporate-square-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div> --}}

                </div>

            </x-widget.section>

        </div>

    </x-layout.v2>

    <!-- Modal -->
    <div class="modal fade" id="all-day-menu" tabindex="-1" aria-labelledby="#all-day-menu-link" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row my-4">
                        <div class="col-12">
                            <h2 class="special-heading fs-3 fw-bold text-center">The All-Day Feast</h2>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-6">
                            <a href="{{ route('menu_all_day_en') }}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                                <img src="{{ asset('v2/svg/flag-english-circle.svg') }}" alt="The All-Day Feast English" style="width: 100%;">
                                <h4 class="special-heading fs-4 fw-bold text-center my-3">English</h4>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a href="{{ route('menu_all_day_fr') }}" class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                                <img src="{{ asset('v2/svg/flag-french-circle.svg') }}" alt="The All-Day Feast French" style="width: 100%;">
                                <h4 class="special-heading fs-4 fw-bold text-center my-3">French</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <style id="private-gathering--styles">
        .text-overlapping {
            margin-top: -10rem;
        }

        @media screen and (max-width: 576px) {
            .text-overlapping {
                margin-top: unset;
            }
        }
    </style>
@endpush
