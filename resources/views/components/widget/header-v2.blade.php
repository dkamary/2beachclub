{{-- Header V2 --}}

@php
    $videoMp4 = asset($videoMp4 ?? 'videos/2beach-club-lifestyle-video-full-2021.mp4');
    $videoWebm = asset($videoWebm ?? 'videos/2beach-club-lifestyle-video-full-2021.webm');
    $home = route('home');
@endphp

<header class="header-container header-container-2">

    <nav class="header-nav header-nav-2">
        {{-- HEADER --}}
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 d-flex justify-content-center align-items-center mx-auto mt-3">
                    <a href="{{ $home }}" class="logo-link">

                        <img
                            src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo-mini.webp') }}"
                            data-src="{{ asset('v2/img/2Beach-Club-by-2F-Final-logo.webp') }}"
                            alt="2beach-club-logo"
                            class="img-fluid lazy-load-image"
                        />

                    </a>
                </div>
            </div>
        </div>

        {{-- MENU --}}
        <x-widget.menu>
            <ul>
                <li class="mb-3"><a href="{{ $home }}" class="smooth-scroll">Home</a></li>
                <li class="mb-3"><a href="{{ $home }}#opening-hours" class="smooth-scroll">Opening Hours</a></li>
                <li class="mb-3"><a href="{{ $home }}#restaurant" class="smooth-scroll">Restaurant</a></li>
                <li class="mb-3"><a href="{{ $home }}#beach-and-pool" class="smooth-scroll">Beach & Pool</a></li>
                <li class="mb-3"><a href="{{ $home }}#events" class="smooth-scroll">Events</a></li>
                <li class="mb-3"><a href="{{ $home }}#upcoming-events" class="smooth-scroll">Upcoming Events</a></li>
                <li class="mb-3"><a href="{{ $home }}#gallery" class="smooth-scroll">Gallery</a></li>
                <li class="mb-3"><a href="{{ $home }}#contact-us" class="smooth-scroll">Contact Us</a></li>
            </ul>
        </x-widget.menu>

    </nav>

    <div class="hero-section hero-section-2" style="background-image: url({{ asset('v2/img/2beach-club-main-entrance.webp') }});"></div>

    <div class="container bg-white above-fold-icons d-flex justify-content-center align-items-center">
        <x-v2.icons :home="$home" class="home-icons" />
    </div>
</header>

@once

    @push('head')

        <style id="header-v2">
            .header-container.header-container-2{
                max-width: 100%;
                height: 100vh;
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
                height: 60vh;
                background-position: center;
                background-size: cover;
            }

            .banner-container {
                height: 70vh;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                background-position: center;
                background-size: cover;
            }

            .banner-container img {
                width: 100% !important;
            }

            .above-fold-icons {
                height: 40vh;
            }

            .home-icons {
                width: 100%;
            }

            @media screen and (min-width: 576px) {

                .hero-section.hero-section-2 {
                    max-width: 100%;
                    height: 80vh;
                    background-position: center;
                    background-size: cover;
                }

                .above-fold-icons {
                    height: 20vh;
                }
            }

        </style>

    @endpush

@endonce
