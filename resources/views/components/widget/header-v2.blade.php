{{-- Header V2 --}}

@php
    $videoMp4 = asset($videoMp4 ?? 'videos/2beach-club-lifestyle-video-full-2021.mp4');
    $videoWebm = asset($videoWebm ?? 'videos/2beach-club-lifestyle-video-full-2021.webm');
@endphp

<header class="header-container header-container-2">

    <nav class="header-nav header-nav-2">
        {{-- HEADER --}}
        <div class="logo-container">
            <a href="{{ route('home_page') }}" class="logo-link">

                <img
                    src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo-mini.webp') }}"
                    data-src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo.webp') }}"
                    alt="2beach-club-logo"
                    class="img-fluid lazy-load-image"
                />

            </a>
        </div>

        {{-- MENU --}}
        <x-widget.menu>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('restaurant') }}">Restaurant</a></li>
                <li><a href="{{ route('beach_pool') }}">Beach & Pool</a></li>
                <li><a href="{{ route('rooftop') }}">Rooftop</a></li>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="{{ route('the_team') }}">The team</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </x-widget.menu>

    </nav>

    <div class="hero-section hero-section-2">

        <div class="banner-container">
            <img
                src="{{ asset('v2/img/2beach-club-header2-mini.webp') }}"
                data-src="{{ asset('v2/img/2beach-club-header2.webp') }}"
                alt="2beach-club-header2"
                class="img-fluid lazy-load-image"
            />
        </div>

        <div class="container bg-white above-fold-icons d-flex justify-content-center align-items-center">

            <div class="row w-100">

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#">
                        <img src="{{ asset('v2/img/restaurant.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#">
                        <img src="{{ asset('v2/img/beach-and-pool.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#">
                        <img src="{{ asset('v2/img/events.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#">
                        <img src="{{ asset('v2/img/reservation.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                    </a>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <a href="#">
                        <img src="{{ asset('v2/img/find-us.png') }}" alt="restaurant" width="135" height="80" class="img-fluid" />
                    </a>
                </div>

            </div>

        </div>

    </div>
</header>

@once

    @push('head')

        <style id="header-v2">
            .header-container.header-container-2{
                max-width: 100%;
                height: auto;
                max-height: 100vh;
            }

            .header-nav.header-nav-2 {
                height: auto;
                width: 100%;
                z-index: 10;
                position: absolute;
                left: 0;
                top: 0;
                background-color: transparent;
            }

            .hero-section.hero-section-2 {
                max-width: 100%;
            }

            .banner-container {
                height: 70vh;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .banner-container img {
                width: 100% !important;
            }

            .above-fold-icons {
                height: 30vh;
            }
        </style>

    @endpush

@endonce
