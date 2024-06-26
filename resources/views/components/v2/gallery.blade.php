{{-- Events --}}

@php

    $class = array_merge(['container'], $class ?? []);

@endphp

<div @class($class) id="{{ $id ?? null }}">

    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h2 class="special-heading fw-bold text-center mb-4 gallery">Gallery</h2>
        </div>
    </div>

    @handheld

        <div class="slick-carousel">

            @foreach (config('gallery') as $gallery)

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset($gallery['gallery']) }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset($gallery['image']) }}"
                        src="{{ asset($gallery['mini']) }}"
                        alt="{{ $gallery['alt'] ?? '' }}"
                    />

                </a>

            </div>

            @endforeach

            {{-- <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-001.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-001.webp') }}"
                        src="{{ asset('v2/img/gallery-001-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-002.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-002.webp') }}"
                        src="{{ asset('v2/img/gallery-002-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-003.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-003.webp') }}"
                        src="{{ asset('v2/img/gallery-003-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-009.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-009.webp') }}"
                        src="{{ asset('v2/img/gallery-009-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-005.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-005.webp') }}"
                        src="{{ asset('v2/img/gallery-005-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-006.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-006.webp') }}"
                        src="{{ asset('v2/img/gallery-006-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-007.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-007.webp') }}"
                        src="{{ asset('v2/img/gallery-007-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="">

                <a href="#" class="d-block overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-008-large.webp') }}">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-008-large.webp') }}"
                        src="{{ asset('v2/img/gallery-008-1.webp') }}"
                        alt=""
                    />

                </a>

            </div> --}}

        </div>

    @elsehandheld

        <div class="row g-3">

            @foreach (config('gallery') as $gallery)

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset($gallery['gallery']) }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset($gallery['image']) }}"
                        src="{{ asset($gallery['mini']) }}"
                        alt="{{ $gallery['alt'] ?? '' }}"
                    />

                </a>

            </div>

            @endforeach

            {{-- <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-001.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-001.webp') }}"
                        src="{{ asset('v2/img/gallery-001-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-002.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-002.webp') }}"
                        src="{{ asset('v2/img/gallery-002-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-003.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-003.webp') }}"
                        src="{{ asset('v2/img/gallery-003-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-009.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-009.webp') }}"
                        src="{{ asset('v2/img/gallery-009-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-005.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-005.webp') }}"
                        src="{{ asset('v2/img/gallery-005-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-006.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-006.webp') }}"
                        src="{{ asset('v2/img/gallery-006-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-007.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-007.webp') }}"
                        src="{{ asset('v2/img/gallery-007-1.webp') }}"
                        alt=""
                    />

                </a>

            </div>

            <div class="col-12 col-md-3 overflow-hidden gallery-photo" data-image="{{ asset('v2/img/gallery-008-large.webp') }}">

                <a href="#" class="d-block overflow-hidden">

                    <img class="w-100 img-fluid lazy-load-image"
                        data-src="{{ asset('v2/img/gallery-008-large.webp') }}"
                        src="{{ asset('v2/img/gallery-008-1.webp') }}"
                        alt=""
                    />

                </a>

            </div> --}}

        </div>

    @endhandheld

</div>

@once

    @push('head')

    <style id="{{ $id }}--styles">
        #gallery {
            margin-bottom: 10%;
        }

        #gallery .special-heading {
            font-size: 32px;
        }

        @media screen and (min-width: 576px) {
            #gallery {
                margin-bottom: 6% !important;
            }

            #gallery .special-heading {
                font-size: 32px;
            }
        }
    </style>

    @endpush

@endonce
