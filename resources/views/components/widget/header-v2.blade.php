{{-- Header V2 --}}

@php
    $bgImage = $bgImage ?? asset('v2/img/2beach-club-video-preview--header.webp');
    $videoMp4 = $videoMp4 ?? asset('videos/2beach-club-lifestyle-video-full-2021.mp4');
    $videoWebm = $videoWebm ?? asset('videos/2beach-club-lifestyle-video-full-2021.webm');
    $home = route('home');
    $class = array_merge(['header-nav', 'header-nav-2',], $class ?? ['linear-bg']);
@endphp

<header class='header-container header-container-2'>

    <nav @class($class)>
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
                <li class="mb-3"><a href="{{ route('become_member') }}" class="smooth-scroll">Become a member</a></li>
                <li class="mb-3"><a href="{{ $home }}#contact-us" class="smooth-scroll">Contact Us</a></li>
            </ul>
        </x-widget.menu>

    </nav>

    <div class="hero-section hero-section-2" style="background-image: url({{ $bgImage }});">
        @isset($title)
            <h1>{!! $title !!}</h1>
        @endisset
    </div>

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
                height: 50vh;
                background-position: center;
                background-size: cover;
                position: relative;
            }

            .hero-section.hero-section-2 h1 {
                color: #ffffff;
                text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
                text-align: center;
                position: absolute;
                bottom: 3%;
                left: 50%;
                transform: translateX(-50%);
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
                height: 50vh;
            }

            .home-icons {
                width: 100%;
            }

            .linear-bg {
                background-image: linear-gradient(
                    to bottom,
                    rgba(63, 156, 170, 0.7),
                    rgba(63, 156, 170, 0.15)
                );
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
