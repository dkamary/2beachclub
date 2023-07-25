{{-- Index Header template --}}

@php
    $videoMp4 = asset('videos/2beach-club-lifestyle-video-full-2021.mp4');
    $videoWebm = asset('videos/2beach-club-lifestyle-video-full-2021.webm');
@endphp

<header class="header-container">
    <nav class="header-nav">
        <div class="logo-container">
            <a href="{{ route('home_page') }}" class="logo-link">
                <picture class="picture-container">
                    <source media="(max-width: 699px)" srcset="{{ asset('img/2beach-club-logo.webp') }}">
                    <source media="(min-width: 1024px)" srcset="{{ asset('img/2beach-club-logo-2x.webp') }}">
                    <img src="{{ asset('img/2beach-club-logo.png') }}" alt="2Beach-Club" width="161" height="61">
                </picture>
            </a>
        </div>
    </nav>
    <div class="hero-section">
        {{--  --}}
    </div>
</header>

@once
    @push('head')
        <style>
            .hero-section {
                min-height: 70vh;
                width: 100%;
                background-size: cover;
                background-position: bottom;
                background-image: url({{ asset('img/hero-header-1440w.webp') }});
            }

            .header-container .header-nav {
                position: absolute;
                width: 100%;
            }

            .header-container {
                height: unset !important;
            }
        </style>
    @endpush
@endonce
