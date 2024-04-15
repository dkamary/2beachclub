{{-- Header --}}

@php
    $videoMp4 = asset($videoMp4 ?? 'videos/2beach-club-lifestyle-video-full-2021.mp4');
    $videoWebm = asset($videoWebm ?? 'videos/2beach-club-lifestyle-video-full-2021.webm');
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
    <div class="hero-section" id="video-2beach-club">

        @mobile
            <video playsinline autoplay muted loop poster="img/hero-header.webp" id="header_video" width="320">
                <source id="source-webm" data-src="{{ $videoWebm }}" type="video/webm">
                <source id="source-mp4" data-src="{{ $videoMp4 }}" type="video/mp4">
            </video>
        @endmobile

        @tablet
            <video playsinline autoplay muted loop poster="img/hero-header-1024w.webp" id="header_video" width="320">
                <source id="source-webm" data-src="{{ $videoWebm }}" type="video/webm">
                <source id="source-mp4" data-src="{{ $videoMp4 }}" type="video/mp4">
            </video>
        @endtablet

        @desktop
            <video playsinline autoplay muted loop poster="img/hero-header-1440w.webp" id="header_video" width="320">
                <source id="source-webm" data-src="{{ $videoWebm }}" type="video/webm">
                <source id="source-mp4" data-src="{{ $videoMp4 }}" type="video/mp4">
            </video>
        @endtablet

        <div id="video-sound" class="muted"></div>

        {{ $slot }}
    </div>
</header>
