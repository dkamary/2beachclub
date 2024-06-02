{{-- Hero header --}}

@php
    $class = array_merge(['hero'], $class ?? []);
    $id = $id ?? uniqid('hero-');
    $background = $background ?? null;
    $height = $height ?? 'half';
@endphp

<section @class($class) id="{{ $id }}">
    {{ $slot }}
</section>

@once

    <style id="hero-styles">
        .hero {
            width: 100%;
            box-sizing: content-box;
            z-index: 0;
            position: relative;
        }
    </style>

@endonce

@if ($background)

    @push('head')
        <style id="{{ $id }}-styles">
            #{{ $id }} {
                background-image: url({{ $background }});
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                @if ($height == 'half')
                    height: 50vh;
                @elseif ($height == 'third')
                    height: 33vh;
                @elseif ($height == 'two-thirds')
                    height: 66vh;
                @else
                    height: 100vh;
                @endif
            }
        </style>
    @endpush

@endif
