{{-- Présentation du restaurant --}}

@php
    $class = array_merge(['container'], $class ?? []);
@endphp

<div @class($class)>

    <x-widget.section
        :id="$id ?? null"
        :lazyload="true"
        :bg-image="asset('v2/img/restaurant/2beach-club-restaurant-sea-view.webp')"
        :bg-image-mini="asset('v2/img/restaurant/2beach-club-restaurant-sea-view-1.webp')"
        :bg-class="['w-100']"

        :text-class="['bg-white']"
        text-placement="right"
        text-size="2/3"
    >

        <div class="row">
            <div class="col-12">
                <h2 class="special-heading fw-bold text-left mb-4">Restaurant</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <p>
                    Hungry after a refreshing dip?
                </p>
                <p>
                    No problem! Dive into our beach club delights!
                </p>
                <p>
                    Our chef-curated menu showcases fresh salads, delectable sushi, a bounty of fresh seafood, and so much more. From lunch to dinner, our offerings will seduce your taste buds and leave you craving for more!
                    And Sundays? They're made for indulgent brunches!
                </p>
                <p>
                    Complementing your culinary adventure is our exquisite wine selection, meticulously crafted by our seasoned sommelier. It's the perfect pairing to elevate your experience at the club!
                </p>
                <x-widget.book />

                <div class="btn-container contact-button book-table my-4">
                    <a href="{{ route('menu_index') }}" class="text-uppercase">
                        See our menus
                    </a>
                </div>
            </div>
        </div>

    </x-widget.section>

    @handheld
        <div class="slick-carousel">

            @foreach (config('restaurant') as $gallery)
                <div class="">
                    <a href="#" class="gallery-photo" data-image="{{ asset($gallery['large']) }}">
                        <img src="{{ asset($gallery['thumbnail']) }}" data-src="{{ asset($gallery['preview']) }}" alt="" class="img-fluid lazy-load-image w-100" />
                    </a>
                </div>
            @endforeach

            {{-- <div class="">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-01-large.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-01-mini.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-01-large.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-002.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-002-2.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-002-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/restaurant-009-1.webp') }}">
                    <img src="{{ asset('v2/img/restaurant-009-2.webp') }}" data-src="{{ asset('v2/img/restaurant-009-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-003.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-003-2.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-003-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div> --}}

        </div>

    @elsehandheld

        <div class="row g-3">

            @foreach (config('restaurant') as $gallery)
                <div class="col-12 col-md-3">
                    <a href="#" class="gallery-photo" data-image="{{ asset($gallery['large']) }}">
                        <img src="{{ asset($gallery['thumbnail']) }}" data-src="{{ asset($gallery['preview']) }}" alt="" class="img-fluid lazy-load-image w-100" />
                    </a>
                </div>
            @endforeach

            {{-- <div class="col-12 col-md-3">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-01-large.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-01-mini.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-01-large.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-002.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-002-2.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-002-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/restaurant-009-1.webp') }}">
                    <img src="{{ asset('v2/img/restaurant-009-2.webp') }}" data-src="{{ asset('v2/img/restaurant-009-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div>

            <div class="col-12 col-md-3">
                <a href="#" class="gallery-photo" data-image="{{ asset('v2/img/2beach-club-gallery-restaurant-003.webp') }}">
                    <img src="{{ asset('v2/img/2beach-club-gallery-restaurant-003-2.webp') }}" data-src="{{ asset('v2/img/2beach-club-gallery-restaurant-003-1.webp') }}" alt="" class="img-fluid lazy-load-image w-100" />
                </a>
            </div> --}}

        </div>

    @endhandheld

</div>

@once

    @push('head')
        <style id="restaurant-presentation--styles">
            #{{ $id }} {
                margin-bottom: unset;
            }

            @media screen and (min-width: 576px) {
                #{{ $id }} {
                    margin-bottom: unset;
                }
            }
        </style>
    @endpush

@endonce
