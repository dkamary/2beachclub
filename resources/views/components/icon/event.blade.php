{{-- event --}}

@php
    $id = $id ?? 'event-icon';
@endphp

<svg id="{{ $id }}" data-name="{{ $id }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 188.67 188.67"
    @isset($width)width="{{ $width }}"@endisset
    @isset($height)width="{{ $height }}"@endisset
    @isset($class)class="{{ $class }}"@endisset
>
    <defs>
        <style>
            .cls-1-{{ $id }} {
                fill: none;
                stroke: #58c6cd;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-width: 2.99px;
            }
        </style>
    </defs>
    <g id="{{ $id }}-2" data-name="{{ $id }}-2">
        <g>
            <g>
                <ellipse class="cls-1-{{ $id }}" cx="115.74" cy="90.69" rx="21.37" ry="9.16"
                    transform="translate(-29.84 70.02) rotate(-30)" />
                <polyline class="cls-1-{{ $id }}" points="134.66 80.99 148.95 147.2 99.15 103.12" />
                <line class="cls-1-{{ $id }}" x1="141.42" y1="112.3" x2="129.58" y2="129.64" />
                <line class="cls-1-{{ $id }}" x1="144.87" y1="128.51" x2="138.11" y2="137.12" />
                <line class="cls-1-{{ $id }}" x1="122.63" y1="97.21" x2="111.54" y2="113.42" />
                <line class="cls-1-{{ $id }}" x1="135.3" y1="100.5" x2="120.56" y2="121.23" />
                <path class="cls-1-{{ $id }}" d="M115.82,50.66s-9.67,10.79-9.08,26.86" />
                <path class="cls-1-{{ $id }}" d="M106,41.47s-9.67,10.79-9.08,26.86" />
                <ellipse class="cls-1-{{ $id }}" cx="72.93" cy="90.69" rx="9.16" ry="21.37"
                    transform="translate(-42.08 108.51) rotate(-60)" />
                <polyline class="cls-1-{{ $id }}" points="54.01 80.99 39.72 147.2 89.52 103.12" />
                <line class="cls-1-{{ $id }}" x1="47.26" y1="112.3" x2="59.09" y2="129.64" />
                <line class="cls-1-{{ $id }}" x1="66.04" y1="97.21" x2="77.13" y2="113.42" />
                <line class="cls-1-{{ $id }}" x1="53.37" y1="100.5" x2="68.11" y2="121.23" />
                <path class="cls-1-{{ $id }}" d="M72.85,50.66s9.67,10.79,9.08,26.86" />
                <path class="cls-1-{{ $id }}" d="M82.67,41.47s9.67,10.79,9.08,26.86" />
            </g>
            <circle class="cls-1-{{ $id }}" cx="94.34" cy="94.34" r="92.84" />
        </g>
    </g>
</svg>
