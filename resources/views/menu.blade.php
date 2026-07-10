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

            <x-widget.section :id="$id ?? null" :lazyload="true" :bg-class="['w-100']" :text-class="['bg-white']"
                text-placement="center" text-size="col-11 col-md-10 mx-auto">

                <div class="row mb-3">
                    <div class="col-12">

                        <h1 class="special-heading fs-1 fw-bold text-center pb-2">{!! $headerTitle !!}</h1>

                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-12">
                        <p>
                            The restaurant at 2Beach Club invites you to indulge in a unique culinary experience where each
                            menu is crafted to delight your taste buds. From the freshness of seafood to flavourful and
                            authentic dishes, our chef has curated a selection that highlights the best local ingredients,
                            blending tradition and innovation in every plate.
                        </p>
                    </div>

                </div>

                <div class="row my-4 g-3">

                    {{-- All-day feat --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_all_day_en') }}" class="text-decoration-none new-menu" {{--
                            data-bs-toggle="modal" data-bs-target="#all-day-menu" id="all-day-menu-link"
                            onclick="return false;" --}}>
                            <img data-src="{{ asset('v2/img/menu/all-day-dining-preview.webp') }}"
                                src="{{ asset('v2/img/menu/all-day-dining-preview-1.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">The All-Day Feast</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Coffee --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_coffee') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/2Beach-Club-Coffee-Banner-Website.webp') }}"
                                src="{{ asset('v2/img/menu/2Beach-Club-Coffee-Banner-Website-preview.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Coffee Menu</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Kids --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_kids') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/Kids-burger.webp') }}"
                                src="{{ asset('v2/img/menu/Kids-burger-1.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Kids’ Favourites</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Aurora --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_aurora') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/2Beach-Club-Aurora-Fridays.webp') }}"
                                src="{{ asset('v2/img/menu/2Beach-Club-Aurora-Fridays-preview.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Aurora Fridays</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Saturday --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_saturday') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/2Beach-Club-Saturday-Tides-Flavours.webp') }}"
                                src="{{ asset('v2/img/menu/2Beach-Club-Saturday-Tides-Flavours-preview.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Saturday Tides & Flavours</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Sunday --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_sunday_fiesta') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/2Beach-Club-Sunday-Surf-Selection.webp') }}"
                                src="{{ asset('v2/img/menu/2Beach-Club-Sunday-Surf-Selection-preview.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Sunday Fiesta Selection</h2>
                            </div>
                        </a>
                    </div>

                    {{-- Tropical Winter --}}
                    <div class="col-12 col-sm-6 mx-auto my-4">
                        <a target="_blank" href="{{ route('menu_tropical_winter') }}" class="text-decoration-none new-menu">

                            <img data-src="{{ asset('v2/img/menu/2Beach-Club-Tropical-Winter-Specials.webp') }}"
                                src="{{ asset('v2/img/menu/2Beach-Club-Tropical-Winter-Specials-preview.webp') }}" alt=""
                                class="img-fluid lazy-load-image w-100">
                            <div class="title-container">
                                <h2 class="special-heading fs-3 fw-bold text-center">Tropical Winter Mood</h2>
                            </div>
                        </a>
                    </div>
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
                            <a target="_blank" href="{{ route('menu_all_day_en') }}"
                                class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                                <img src="{{ asset('v2/svg/flag-english-circle.svg') }}" alt="The All-Day Feast English"
                                    style="width: 100%;">
                                <h4 class="special-heading fs-4 fw-bold text-center my-3">English</h4>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6">
                            <a target="_blank" href="{{ route('menu_all_day_fr') }}"
                                class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                                <img src="{{ asset('v2/svg/flag-french-circle.svg') }}" alt="The All-Day Feast French"
                                    style="width: 100%;">
                                <h4 class="special-heading fs-4 fw-bold text-center my-3">French</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('popup')
    @include('_partials.popup')
@endsection

@push('head')
    <style id="private-gathering--styles">
        .text-overlapping {
            margin-top: -10rem;
        }

        .new-menu {
            position: relative;
            display: block;
        }

        .new-menu::before {
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            z-index: 10;
            opacity: 0;
            transition: .6s ease-in-out;
            filter: drop-shadow(0px 1px 4px rgba(0, 0, 0, 0.5));
            background-repeat: no-repeat;
            background-size: 33%;
            background-position: center;
            background-image: url({{ asset('v2/svg/download.svg') }});
        }

        .new-menu:hover::before {
            opacity: 1;
        }

        .new-menu .title-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
            padding: 1rem .5rem;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-image: linear-gradient(to top, rgba(63, 156, 170, 0.7), rgba(63, 156, 170, 0.15));
        }

        .new-menu .title-container .special-heading {
            color: #ffffff;
            text-shadow: 0 0 4px rgba(63, 156, 170, .9);
        }

        .new-menu img {
            aspect-ratio: 1/1;
            object-fit: cover;
        }

        @media screen and (max-width: 576px) {
            .text-overlapping {
                margin-top: unset;
            }
        }
    </style>
@endpush