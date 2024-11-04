{{-- Menu --}}

@php
    // header
    $headerBg = asset("v2/img/events/headers/2beach-club-events-headers-001.webp");
    $headerTitle = 'The All-Day Feast';

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
                            The restaurant at 2Beach Club invites you to indulge in a unique culinary experience where each menu is crafted to delight your taste buds, presented in both English and French versions.
                        </p>
                    </div>

                </div>

                <div class="row my-4 g-3">

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="{{ route('menu_all_day_en') }}" class="text-decoration-none english" data-bs-toggle="modal" data-bs-target="#all-day-menu">
                            <h2 class="special-heading fs-3 fw-bold text-center">English version</h2>
                            <img
                                data-src="{{ asset('v2/img/menu/all-day-dining-preview.webp') }}"
                                src="{{ asset('v2/img/menu/all-day-dining-preview-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3x mx-auto my-4">
                        <a href="{{ route('menu_all_day_fr') }}" class="text-decoration-none french">
                            <h2 class="special-heading fs-3 fw-bold text-center">French version</h2>
                            <img
                                data-src="{{ asset('v2/img/menu/all-day-dining-preview.webp') }}"
                                src="{{ asset('v2/img/menu/all-day-dining-preview-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100">
                        </a>
                    </div>

                </div>

            </x-widget.section>


            <div class="row mt-n3">
                <div class="col-12 d-flex justify-content-center">
                    <div class="btn-container contact-button book-table mb-4">
                        <a href="{{ route('menu_index') }}" class="text-uppercase">
                            Our Menus
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </x-layout.v2>

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

        .english,
        .french {
            position: relative;
            display: block;
        }

        .english::after,
        .french::after {
            content: '';
            display: block;
            width: 256px;
            height: 256px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            z-index: 10;
            margin-top: 5%;
        }

        .english::after {
            background-image: url({{ asset('v2/svg/flag-english-circle.svg') }})
        }

        .french::after {
            background-image: url({{ asset('v2/svg/flag-french-circle.svg') }})
        }
    </style>
@endpush
